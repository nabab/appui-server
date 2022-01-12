<?php

if ($model->hasData(['service', 'server', 'action'], true)
    && ($server = new \bbn\Appui\Server($model->data['server']))
) {
  switch ($model->data['action']) {
    case 'start':
      $method = 'startService';
      break;
    case 'stop':
      $method = 'stopService';
      break;
    case 'restart':
      $method = 'restartService';
      break;
  }

  return [
    'success' => !!$server->addToTasksQueue($method, [$model->data['service']])
  ];
}

return ['success' => false];
