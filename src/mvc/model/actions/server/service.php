<?php

if ($model->hasData(['service', 'server', 'action'], true)
    && ($server = new \bbn\Appui\Server($model->data['server']))
) {
  switch ($model->data['action']) {
    case 'start':
      $res = $server->startService($model->data['service']);
      break;
    case 'stop':
      $res = $server->stopService($model->data['service']);
      break;
    case 'restart':
      $res = $server->restartService($model->data['service']);
      break;
  }

  return ['success' => $res];
}

return ['success' => false];
