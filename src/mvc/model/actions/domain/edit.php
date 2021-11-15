<?php

if ($model->hasData(['server', 'type'], true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return ['success' => false];
  }

  return [
    'success' => $server->editDomain($model->data)
  ];
}
return ['success' => false];
