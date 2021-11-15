<?php

$model->data['limit'] = isset($model->data['limit']) && is_int($model->data['limit']) ? $model->data['limit'] : 5;
$model->data['start'] = isset($model->data['start']) && is_int($model->data['start']) ? $model->data['start'] : 0;
$opt_cfg = $model->inc->options->getClassCfg();
$grid = new \bbn\Appui\Grid($model->db, $model->data, [
  'table' => $opt_cfg['table'],
  'fields' => [
    $opt_cfg['arch']['options']['id'],
    'name' => $opt_cfg['arch']['options']['text'],
    $opt_cfg['arch']['options']['code'],
    'cloudmin' => 'JSON_UNQUOTE(JSON_EXTRACT(' . $opt_cfg['arch']['options']['value'] . ', "$.cloudmin"))'
  ],
  'filters' => [
    'conditions' => [[
      'field' => $opt_cfg['arch']['options']['id_parent'],
      'value' => $model->inc->options->fromCode('servers', 'server', 'appui')
    ]]
  ],
  'order' => [[
    'field' => 'name',
    'dir' => 'ASC'
  ]]
]);
if ($grid->check()) {
  return $grid->getDatatable();
}
