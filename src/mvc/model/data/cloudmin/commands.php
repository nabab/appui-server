<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 15.23
 */

$backup_lan_id = $model->inc->options->fromCode('cloudmin.lan', 'servers', 'server', BBN_APPUI);
$cred = $model->inc->options->option($backup_lan_id);

$psw =  new \bbn\Appui\Passwords($model->db);

if (is_array($cred)) {
  $conf = [
    'user' => $cred['user'],
    'pass' => $psw->get($backup_lan_id),
    'host' => $cred['code'],
    'mode' => 'cloudmin'
  ];
  $jsonFile = $model->pluginDataPath() . 'servers/'.$conf['mode'].'/'.$conf['host'].'.json';
  $commands = [];
  if (is_file($jsonFile)) {
    $commands = json_decode(file_get_contents($jsonFile), true);
  }
  if (empty($commands)) {
    $vm = new \bbn\Api\Virtualmin($conf);
    $listCommands = $vm->listCommands(['short' => 1]);
    $commands = [];
    if (!empty($listCommands) && is_array($listCommands)) {
      foreach($listCommands as $cmd ){
        $commands[$cmd['name']] = $vm->getCommand($cmd['name']);
      }
      if (\bbn\File\Dir::createPath(\bbn\X::dirname($jsonFile))) {
        file_put_contents($jsonFile, json_encode($commands));
      }
    }
  }
  return [
    'commands' => $commands
  ];
}

return [];
