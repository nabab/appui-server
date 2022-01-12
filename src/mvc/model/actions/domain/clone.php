<?php

if ($model->hasData(['server', 'domain', 'newdomain'], true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return ['success' => false];
  }

  return [
    'success' => !!$server->addToTasksQueue('cloneDomain', [$model->data['domain'], $model->data['newdomain']])
  ];
}
