<?php
if ($model->hasData('server', true)) {
  $cache = \bbn\Cache::getEngine();
  $cacheName = 'bbn/Appui/Server/'.$model->data['server'].'/mem';
  if (!$cache->has($cacheName) || $model->hasData('force', true)) {
    $model->getModel(
      $model->pluginUrl('appui-server').'/actions/cache',
      [
        'server' => $model->data['server'],
        'mode' => 'mem'
      ]
    );
  }

  if ($data = $cache->get($cacheName)) {
    foreach ($data as $i => $m) {
      switch ($i) {
        case 0:
          $data['realTotal'] = $m;
          break;
        case 1:
          $data['realUsed'] = $m;
          break;
        case 2:
          $data['swapTotal'] = $m;
          break;
        case 3:
          $data['swapUsed'] = $m;
          break;
        case 4:
          $data['cached'] = $m;
          break;
      }

      unset($data[$i]);
    }

    return [
      'items' => $data
    ];
  }
}

return [];
