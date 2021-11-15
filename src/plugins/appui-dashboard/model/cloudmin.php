<?php

/** @var \bbn\Mvc\Model $model */
$model->data['filters'] = [
  'conditions' => [[
    'field' => 'JSON_EXTRACT(value, "$.cloudmin")',
      'value' => 1
  ]]
];
return $model->getSubpluginModel('servers', $model->data, 'appui-server', 'appui-dashboard');
