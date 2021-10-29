<?php
if ($model->hasData('server', true)) {
  $cache = \bbn\Cache::getEngine();
  $cacheName = 'bbn/Appui/Server/'.$model->data['server'].'/poss';
  if (!$cache->has($cacheName) || $model->hasData('force', true)) {
    $model->getModel(
      $model->pluginUrl('appui-server').'/actions/cache',
      [
        'server' => $model->data['server'],
        'mode' => 'poss'
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
