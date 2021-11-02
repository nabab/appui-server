<?php

if ($model->hasData('server', true)) {
  $server   = $model->data['server'];
  $cache    = \bbn\Cache::getEngine();
  $mode     = @$model->data['mode'];
  if (\bbn\Str::isUid($server)) {
    $server = $model->inc->options->code($serverId);
  }

  if (!empty($server) && isset($model->inc->vm)) {
    $cacheName = "bbn/Appui/Server/$server/";
    $infoModes = [
      'cpu',
      'disk_free',
      'disk_fs',
      'disk_total',
      'fcount',
      'ftypes',
      'host',
      'io',
      'kernel',
      'load',
      'maxquota',
      'mem',
      'procs',
      'progs',
      'poss',
      'reboot',
      'status',
      'vposs'

    ];
    if (empty($mode) || ($mode === 'info') || in_array($mode, $infoModes, true)) {
      $search = in_array($mode, $infoModes) ? ['search' => $mode] : [];
      die(var_dump($model->inc->vm->info($search)));
      if ($info = $model->inc->vm->info($search)) {
        foreach ($info as $k => $v) {
          $cache->set($cacheName . $k, $v, 0);
        }
      }
    }

    if (empty($mode) || ($mode === 'list_domais')) {
      $cache->set($cacheName . 'list_domains', $model->inc->vm->list_domains() ?: [], 0);
    }

    if ((($mode === 'list_subdomains')
        || (!$model->hasData('domain', true)
            && (empty($mode)
                || ($mode === 'list_admins')
                || ($mode === 'list_users'))))
        && !$cache->has($cacheName . 'list_domains')
    ) {
      $cache->set(
        $cacheName . 'list_domains',
        $model->inc->vm->list_domains() ?: [],
        0
      );
    }

    if (empty($mode) || ($mode === 'list_subdomains')) {
      $allDomains = $cache->get($cacheName . 'list_domains') ?: [];
      $domains    = [];
      foreach ($allDomains as $d) {
        if (!empty($d['values']['parent_domain'])) {
          if (!isset($domains[$d['values']['parent_domain'][0]])) {
            $domains[$d['values']['parent_domain'][0]] = [];
          }

          $domains[$d['values']['parent_domain'][0]][] = $d;
        }
      }

      if ($model->hasData('domain', true)) {
        $cache->set(
          $cacheName . '/domains/' . $model->data['domain'] . '/list_subdomains',
          $domains[$model->data['domain']] ?? [],
          0
        );
      }
      else {
        foreach ($allDomains as $domain) {
          $cache->set(
            "$cacheName/domains/$domain[name]/list_subdomains",
            $domains[$domain['name']] ?? [],
            0
          );
        }
      }
    }

    if (empty($mode) || ($mode === 'list_admins')) {
      if ($model->hasData('domain', true)) {
        $cache->set(
          $cacheName . '/domains/' . $model->data['domain'] . '/list_admins',
          $model->inc->vm->list_admins(['domain' => $model->data['domain']]) ?: [],
          0
        );
      }
      else {
        if ($domains = $cache->get($cacheName . 'list_domains')) {
          foreach ($domains as $domain) {
            $cache->set(
              "$cacheName/domains/$domain[name]/list_admins",
              $model->inc->vm->list_admins(['domain' => $domain['name']]) ?: [],
              0
            );
          }
        }
      }
    }

    if (empty($mode) || ($mode === 'list_users')) {
      $users = $model->inc->vm->list_users(
        [
          'domain' => '',
          'all-domains' => 1,
          'domain-user' => '',
          'include-owner' => 1
        ]
      ) ?: [];
      if ($model->hasData('domain', true)) {
        $domain = $model->data['domain'];
        $cache->set(
          "$cacheName/domains/$domain/list_users",
          array_values(
            array_filter(
              $users,
              function ($user) use ($domain) {
                return in_array($domain, $user['values']['domain'], true);
              }
            )
          ),
          0
        );
      }
      else {
        if ($domains = $cache->get($cacheName . 'list_domains')) {
          foreach ($domains as $domain) {
            $cache->set(
              "$cacheName/domains/$domain[name]/list_users",
              array_values(
                array_filter(
                  $users,
                  function ($user) use ($domain) {
                    return in_array($domain['name'], $user['values']['domain'], true);
                  }
                )
              ),
              0
            );
          }
        }
      }
    }
  }
}
