<?php

if ($model->hasData('server', true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return [];
  }

  if ($data = $server->getCache('disk_fs', $model->hasData('force', true))) {
    return [
      'items' => $data
    ];
  }
}

return [];
