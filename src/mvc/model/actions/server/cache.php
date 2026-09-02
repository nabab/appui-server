<?php
if ($model->hasData('id', true)
  && ($code = $model->inc->options->code($model->data['id']))
  && ($server = new \bbn\Appui\Server($model->db, $code))
) {
  return [
    'success' => !!$server->addToTasksQueue('makeCache')
  ];
}
return ['success' => false];
