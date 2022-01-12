<?php

if ($model->hasData(['server', 'type', 'name'], true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return ['success' => false];
  }

  unset($model->data['res']);
  return [
    'success' => !!$server->addToTasksQueue('createDomain', [$model->data])
  ];
}
return ['success' => false];
