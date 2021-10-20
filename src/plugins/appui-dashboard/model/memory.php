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
  && ($mem = $vm->info(['search' => 'mem']))
) {
  $mem = str_replace("mem: \n    * ", '', $mem);
  $mem = str_replace("\n", '', $mem);
  $mem = str_replace('    * ', ' ', $mem);
  $mem = explode(' ', trim($mem));
  foreach ($mem as $i => $m) {
    switch ($i) {
      case 0:
        $mem['realTotal'] = $m;
        break;
      case 1:
        $mem['realUsed'] = $m;
        break;
      case 2:
        $mem['swapTotal'] = $m;
        break;
      case 3:
        $mem['swapUsed'] = $m;
        break;
      case 4:
        $mem['cached'] = $m;
        break;
    }
    unset($mem[$i]);
  }
  return [
    'items' => $mem
  ];
}
return [];