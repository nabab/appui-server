<?php

if ($model->hasData('server', true)) {
  $cache     = \bbn\Cache::getEngine();
  $server    = $model->data['server'];
  $cacheName = \bbn\Appui\Server::CACHE_NAME . "/$server/";
  try {
    $s = new \bbn\Appui\Server($server);
  }
  catch (Exception $e) {
    $s = false;
  }
  if (
      !empty($s)
      && (!$cache->has($cacheName . 'list_domains')
        || $model->hasData('force', true))
  ) {
    $s->makeCache('list_domains');
  }

  if ($data = $cache->get($cacheName . 'list_domains')) {
    $normalizeDomain = function($d) use($server, $cache, $cacheName, $model){
      if (
          !empty($s)
          && (!$cache->has($cacheName . 'domains/' . $d['name'] . '/list_admins')
          || $model->hasData('force', true))
      ) {
        $s->makeCache('list_admins', $d['name']);
      }

      if (
          !empty($s)
          && (!$cache->has($cacheName . 'domains/' . $d['name'] . '/list_users')
            || $model->hasData('force', true))
      ) {
        $s->makeCache('list_users', $d['name']);
      }

      $res = [
        'name' => $d['name'],
        'server' => $server,
        'info' => $d['values'],
        'disabled' => isset($d['values']['disabled']),
        'created' => $d['values']['created_on'][0],
        'log' => [
          'access_log' => !empty($d['values']['access_log']) ? $d['values']['access_log'][0] : '',
          'error_log' => !empty($d['values']['error_log']) ? $d['values']['error_log'][0] : '',
        ],
        'admins' => $cache->get($cacheName . 'domains/' . $d['name'] . '/list_admins') ?: [],
        'users' => $cache->get($cacheName . 'domains/' . $d['name'] . '/list_users') ?: []
      ];

      if (!empty($d['values']['parent_domain'])) {
        $res['parent'] = $d['values']['parent_domain'][0];
      }
      else {
        $blockQuotaUsed = $d['values']['server_block_quota_used'][0];
        $blockQuota     = $d['values']['server_block_quota'][0];
        $rapQuota       = '';
        if ($blockQuota !== 'Unlimited') {
          $rapQuota = ($blockQuotaUsed * 100) / $blockQuota;
          $rapQuota = number_format($rapQuota, 2).'%';
        }
        else {
          $rapQuota = _('Unlimited');
        }

        $res = array_merge(
          $res,
          [
            'total_quota' => $blockQuota ?? _('Unlimited'),
            'quota_used' => $blockQuotaUsed,
            'server_quota' => $d['values']['server_quota'][0],
            'serverquota_used' => $d['values']['server_quota_used'][0],
            'alert_quota' => (is_numeric($rapQuota) && ($rapQuota > 90)) ? true : false,
            'rapport_quota' => $rapQuota
          ]
        );
      }

      return $res;
    };

    $domains = [];
    foreach ($data as $d) {
      if (!empty($d['values']['parent_domain'])) {
        if (!isset($domains[$d['values']['parent_domain'][0]])) {
          $domains[$d['values']['parent_domain'][0]] = [
            'subdomains' => []
          ];
        }

        $domains[$d['values']['parent_domain'][0]]['subdomains'][] = $normalizeDomain($d);
        \bbn\X::sortBy($domains[$d['values']['parent_domain'][0]]['subdomains'], 'name', 'asc');
      }

      if (!$model->hasData('onlyParent', true) || empty($d['values']['parent_domain'])) {
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
