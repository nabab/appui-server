<?php
$opt_cfg = $model->inc->options->getClassCfg();
$grid = new \bbn\Appui\Grid($model->db, $model->data, [
  'table' => $opt_cfg['table'],
  'fields' => [
    $opt_cfg['arch']['options']['id'],
    'name' => $opt_cfg['arch']['options']['text'],
    $opt_cfg['arch']['options']['code'],
    'cloudmin' => 'JSON_UNQUOTE(JSON_EXTRACT(' . $opt_cfg['arch']['options']['value'] . ', "$.cloudmin"))',
    'user' => 'JSON_UNQUOTE(JSON_EXTRACT(' . $opt_cfg['arch']['options']['value'] . ', "$.user"))'
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
        $server->setOffline();
        foreach ($caches as $c) {
          $cd = $server->getCache($c, false);
          if (is_array($cd)) {
            foreach ($cd as $k => $v) {
              $nk = str_replace(' ', '_', strtolower($k));
              unset($cd[$k]);
              $cd[$nk] = $v;
            }
            $data['data'][$i] = \bbn\X::mergeArrays($data['data'][$i], $cd);
          }
          else {
            $data['data'][$i][$c] = $cd;
          }
        }
        $domains = $server->getCache('domains', false);
        $data['data'][$i]['domains'] = is_array($domains) ? count($domains) : 0;
      }
      catch (Exception $e) {}
    }
  }
  return $data;
}
return ['success' => false];
