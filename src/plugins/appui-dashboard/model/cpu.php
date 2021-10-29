<?php
if ($model->hasData('server', true)) {
  $cache = \bbn\Cache::getEngine();
  $cacheName = 'bbn/Appui/Server/'.$model->data['server'].'/cpu';
  if (!$cache->has($cacheName) || $model->hasData('force', true)) {
    $model->getModel(
      $model->pluginUrl('appui-server').'/actions/cache',
      [
        'server' => $model->data['server'],
        'mode' => 'cpu'
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
