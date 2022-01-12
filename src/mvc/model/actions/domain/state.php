<?php

if ($model->hasData(['server', 'domain', 'state'], true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return ['success' => false];
  }

  return [
    'success' => !!$server->addToTasksQueue('setDomainState', [$model->data['domain'], $model->data['state'] === 'enabled'])
  ];
}
