<?php

if ($model->hasData('server', true)) {
  $cache     = \bbn\Cache::getEngine();
  $cacheName = \bbn\Appui\Server::CACHE_NAME . '/' . $model->data['server'] . '/cpu';
  if (!$cache->has($cacheName) || $model->hasData('force', true)) {
    try {
      $s = new \bbn\Appui\Server($model->data['server']);
      $s->makeCache('cpu');
    }
    catch (Exception $e) {
      return [];
    }
  }

  if ($data = $cache->get($cacheName)) {
    return [
      'items' => $data
    ];
  }
}

return [];
