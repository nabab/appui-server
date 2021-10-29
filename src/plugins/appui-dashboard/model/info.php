<?php
if ($model->hasData('server', true)) {
  $cache     = \bbn\Cache::getEngine();
  $cacheName = 'bbn/Appui/Server/'.$model->data['server'].'/';
  $caches    = ['kernel', 'host', 'progs', 'procs'];
  $data      = [];
  foreach ($caches as $c) {
    if (!$cache->has($cacheName.$c) || $model->hasData('force', true)) {
      $model->getModel(
        $model->pluginUrl('appui-server').'/actions/cache',
        [
          'server' => $model->data['server'],
          'mode' => $c
        ]
      );
    }

    $data[$c] = $cache->get($cacheName.$c);
  }

  return [
    'items' => $data
  ];
}

return [];
