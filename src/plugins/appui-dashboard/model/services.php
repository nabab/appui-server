<?php

if ($model->hasData('server', true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return [];
  }

  if ($data = $server->getCache('status', $model->hasData('force', true))) {
    return [
      'items' => $data
    ];
  }
}

return [];
