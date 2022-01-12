<?php

if ($model->hasData('server', true)) {
  $serverName = $model->data['server'];
  try {
    $server = new \bbn\Appui\Server($serverName);
  }
  catch (Exception $e) {
    return [
      'data' => [],
      'total' => 0
    ];
  }

  if ($data = $server->getCache('domains', $model->hasData('force', true))) {
    $normalizeDomain = function ($d) use ($serverName, $server, $model) {
      $features = [];
      foreach (explode(' ', $d['features']) as $f) {
        $features[$f] = 1;
      }

      $type = !empty($d['parent_domain']) ? 'sub' : (!empty($d['real_domain']) ? 'alias' : 'top');
      $mf   = $model->getModel($model->pluginUrl('appui-server') . '/data/domain/features', [
        'server' => $model->data['server'],
        'type' => $type,
        'domain' => $d['name']
      ]);
      if (!empty($mf['data'])) {
        foreach ($mf['data'] as $f) {
          if (
              (strtolower($f['automatic']) === 'no')
              && (strtolower($f['enabled']) === 'yes')
              && !array_key_exists($f['name'], $features)
          ) {
            $features[$f['name']] = 0;
          }
        }
      }
      $res  = [
        'name' => $d['name'],
        'server' => $serverName,
        'description' => $d['description'],
        'features' => $features,
        'availableFeatures' => $mf['data'] ?? [],
        'type' => $type,
        'password' => '',
        'info' => $d,
        'disabled' => isset($d['disabled']),
        'created' => $d['created_on'],
        'log' => [
          'access_log' => $d['access_log'] ?? '',
          'error_log' => $d['error_log'] ?? '',
        ],
        'admins' => $server->getCache('admins', $model->hasData('force', true), $d['name']) ?: [],
        'users' => $server->getCache('users', $model->hasData('force', true), $d['name']) ?: []
      ];

      if (!empty($d['parent_domain'])) {
        $res['parent'] = $d['parent_domain'];
      }
      else {
        $serverQuotaUsed = !empty($d['server_block_quota_used']) && is_numeric($d['server_block_quota_used']) ? $d['server_block_quota_used'] * 1024 : 0;
        $serverQuota     = !empty($d['server_block_quota']) && is_numeric($d['server_block_quota']) ? $d['server_block_quota'] * 1024 : 0;
        $percServerQuota = '';
        $userQuotaUsed   = !empty($d['user_block_quota_used']) && is_numeric($d['user_block_quota_used']) ? $d['user_block_quota_used'] * 1024 : 0;
        $userQuota       = !empty($d['user_block_quota']) && is_numeric($d['user_block_quota']) ? $d['user_block_quota'] * 1024 : 0;
        if (!empty($serverQuota)) {
          $percServerQuota = ($serverQuotaUsed * 100) / $serverQuota;
          $percServerQuota = number_format($percServerQuota, 2);
        }
        else {
          $percServerQuota = 0;
        }

        if (!empty($userQuota)) {
          $percUserQuota = ($userQuotaUsed * 100) / $userQuota;
          $percUserQuota = number_format($percUserQuota, 2);
        }
        else {
          $percUserQuota = 0;
        }

        $res = array_merge(
            $res,
            [
              'userQuota' => $userQuota,
              'userQuotaUsed' => $userQuotaUsed,
              'userPercQuota' => $percUserQuota . '%',
              'serverAlertQuota' => $percUserQuota > 90,
              'serverQuota' => $serverQuota,
              'serverQuotaUsed' => $serverQuotaUsed,
              'serverPercQuota' => $percServerQuota . '%',
              'serverAlertQuota' => $percServerQuota > 90
            ]
        );
      }

      return $res;
    };

    $domains = [];
    foreach ($data as $d) {
      if (!empty($d['parent_domain'])) {
        if (!isset($domains[$d['parent_domain']])) {
          $domains[$d['parent_domain']] = [
            'subdomains' => []
          ];
        }

        $domains[$d['parent_domain']]['subdomains'][] = $normalizeDomain($d);
        \bbn\X::sortBy($domains[$d['parent_domain']]['subdomains'], 'name', 'asc');
      }

      if (!$model->hasData('onlyParent', true) || empty($d['parent_domain'])) {
        if (isset($domains[$d['name']])) {
          $domains[$d['name']] = array_merge($domains[$d['name']], $normalizeDomain($d));
        }
        else {
          $domains[$d['name']]               = $normalizeDomain($d);
          $domains[$d['name']]['subdomains'] = [];
        }
      }
    }

    ksort($domains);
    return [
      'data' => array_values($domains),
      'total' => count($domains)
    ];
  }
}

return [];
