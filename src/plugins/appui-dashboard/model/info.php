<?php

if ($model->hasData('server', true)) {
  $cache     = \bbn\Cache::getEngine();
  $cacheName = \bbn\Appui\Server::CACHE_NAME . '/' . $model->data['server'] . '/';
  $caches    = ['kernel', 'host', 'progs', 'procs'];
  $data      = [];
  foreach ($caches as $c) {
    if (!$cache->has($cacheName . $c) || $model->hasData('force', true)) {
      try {
        $s = new \bbn\Appui\Server($model->data['server']);
        $s->makeCache($c);
      }
      catch (Exception $e) {
        return [];
      }
    }

    $data[$c] = $cache->get($cacheName . $c);
  }

  return [
    'items' => $data
  ];
}

return [];
