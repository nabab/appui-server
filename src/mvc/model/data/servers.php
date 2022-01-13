<?php
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
  $data = $grid->getDatatable();
  if (!empty($data['data'])) {
    $caches = ['kernel', 'host', 'progs', 'procs', 'uptime'];
    foreach ($data['data'] as $i => $d) {
      try {
        $server = new \bbn\Appui\Server($d['code']);
        foreach ($caches as $c) {
          $data['data'][$i][$c] = $server->getCache($c, false);
        }
      }
      catch (Exception $e) {}
    }
  }
  return $data;
}
return ['success' => false];
