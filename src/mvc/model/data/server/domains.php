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
      $res = [
        'name' => $d['name'],
        'server' => $serverName,
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
        $blockQuotaUsed = $d['server_block_quota_used'] ?? 0;
        $blockQuota     = $d['server_block_quota'] ?? 0;
        $rapQuota       = '';
        if (!empty($blockQuota) && ($blockQuota !== 'Unlimited')) {
          $rapQuota = ($blockQuotaUsed * 100) / $blockQuota;
          $rapQuota = number_format($rapQuota, 2) . '%';
        }
        else {
          $rapQuota = _('Unlimited');
        }

        $res = array_merge(
            $res,
            [
              'total_quota' => $blockQuota ?: _('Unlimited'),
              'quota_used' => $blockQuotaUsed,
              'server_quota' => $d['server_quota'] ?? 0,
              'serverquota_used' => $d['server_quota_used'] ?? 0,
              'alert_quota' => (is_numeric($rapQuota) && ($rapQuota > 90)) ? true : false,
              'rapport_quota' => $rapQuota
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
