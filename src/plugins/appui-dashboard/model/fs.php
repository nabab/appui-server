<?php
if ($model->hasData('server', true)
  && ($opt = $model->inc->options->option($model->data['server'], 'servers', 'server', 'appui'))
  && (!empty($opt['user']))
  && ($psw = new \bbn\Appui\Passwords($model->db))
  && ($pass = $psw->get($opt['id']))
  && ($vm = new \bbn\Api\Virtualmin([
    'user' => $opt['user'],
    'pass' => $pass,
    'host' => $opt['code'],
    'mode' => 'virtualmin'
  ]))
  && ($fs = $vm->info(['search' => 'disk_fs']))
) {
  $items = [];
  $arr =  explode('*', $fs);
  unset($arr[0]);
  $arr = array_values($arr);
  foreach($arr as $v){
    $item = [];
    $x = explode("\n", $v);
    unset($x[0]);
    $x = array_values($x);
    foreach($x as $w){
      if (!empty($w)) {
        $w = str_replace(" ", "", $w);
        $strs = explode(":", $w);
        $item[$strs[0]] = $strs[1];
      }
    }
    array_push($items, $item);
  }
  return [
    'items' => $items
  ];
}
return [];