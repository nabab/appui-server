<?php

if ($model->hasData(['server', 'domain', 'newdomain'], true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return ['success' => false];
  }

  if ($server->renameDomain($model->data['domain'], $model->data['newdomain'])) {
    return ['success' => true];
  }
  else {
    return [
      'success' => false,
      'error' => $server->getVirtualmin()->error
    ];
  }
}
