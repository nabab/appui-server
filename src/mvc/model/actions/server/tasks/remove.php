<?php
if ($model->hasData(['server', 'id'], true)) {
  $server = new \bbn\Appui\Server($model->data['server']);
  return [
    'success' => $server->removeFromTasksQueue($model->data['id'])
  ];
}
return ['success' => false];