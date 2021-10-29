<?php
if ($model->hasData('server', true)) {
  $cache = \bbn\Cache::getEngine();
  $cacheName = 'bbn/Appui/Server/'.$model->data['server'].'/status';
  if (!$cache->has($cacheName) || $model->hasData('force', true)) {
    $model->getModel(
      $model->pluginUrl('appui-server').'/actions/cache',
      [
        'server' => $model->data['server'],
        'mode' => 'status'
      ]
    );
  }

  if ($data = $cache->get($cacheName)) {
    return [
      'items' => $data
    ];
  }
}

return [];
