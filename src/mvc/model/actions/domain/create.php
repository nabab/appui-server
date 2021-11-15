<?php

if ($model->hasData(['server', 'type', 'name'], true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return ['success' => false];
  }

  return [
    'success' => $server->createDomain($model->data)
  ];
}
return ['success' => false];
