<?php

if ($model->hasData(['server', 'domain'], true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return ['success' => false];
  }

  return [
    'success' => $server->deleteDomain($model->data['domain'])
  ];
}
return ['success' => false];
