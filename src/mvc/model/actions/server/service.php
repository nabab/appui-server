<?php
if ($model->hasData(['service', 'server', 'action'], true)
    && ($server = $model->inc->options->option($model->data['server'], 'servers', 'server', 'appui'))
    && !empty($server['user'])
    && ($pass = $model->inc->psw->get($server['id']))
) {
  $webmin = new \bbn\Api\Webmin(
    [
      'user' => $server['user'],
      'pass' => $pass,
      'host' => $model->data['server']
    ]
  );
  switch ($model->data['action']) {
    case 'start':
      $res = $webmin->startService($model->data['service']);
      break;
    case 'stop':
      $res = $webmin->stopService($model->data['service']);
      break;
    case 'restart':
      $res = $webmin->restartService($model->data['service']);
      break;
  }

  return ['success' => $res];
}

return ['success' => false];
