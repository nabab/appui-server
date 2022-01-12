<?php

if ($model->hasData(['server', 'type'], true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return ['success' => false];
  }

  unset($model->data['res']);
  return [
    'success' => !!$server->addToTasksQueue('editDomain', [$model->data])
  ];
}
return ['success' => false];
