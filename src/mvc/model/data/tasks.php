<?php
if ($db = \bbn\Appui\Server::getDb()) {
  $cfg = [
    'table' => 'queue',
    'fields' => [],
    'filters' => [
      'conditions' => [[
        'field' => 'active',
        'value' => 1
      ]]
    ],
    'order' => ['id' => 'desc']
  ];
  if (!empty($model->data['server'])) {
    $cfg['filters']['conditions'][] = [
      'field' => 'server',
      'value' => $model->data['server']
    ];
  }
  $grid = new \bbn\Appui\Grid($db, $model->data, $cfg);
  if ($grid->check()) {
    return $grid->getDatatable();
  }
}