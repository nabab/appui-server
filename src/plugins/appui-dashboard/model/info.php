<?php

if ($model->hasData('server', true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return [];
  }
  $caches = ['kernel', 'host', 'progs', 'procs', 'uptime'];
  $data   = [];
  foreach ($caches as $c) {
    $data[$c] = $server->getCache($c, $model->hasData('force', true));
  }

  return [
    'items' => $data
  ];
}

return [];
