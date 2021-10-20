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
  && ($cpu = $vm->info(['search' => 'cpu']))
) {
  $cpu = str_replace("cpu: \n    * ", '', $cpu);
  $cpu = str_replace("\n", '', $cpu);
  $cpu = str_replace('    * ', ' ', $cpu);
  $cpu = explode(' ', trim($cpu));
  return [
    'items' => $cpu
  ];
}
return [];