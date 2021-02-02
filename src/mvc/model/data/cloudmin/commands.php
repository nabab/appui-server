<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 15.23
 */


$backup = BBN_DATA_PATH . 'plugins/appui-server/into.text';

$text = file_get_contents($backup);

$cred = explode(',', $text);
if ( is_array($cred) ){
  $conf = [
    'user' => $cred[0],
    'pass' => $cred[1],
    'host' => $cred[2],
    'mode' => $cred[3]
  ];

  $backup_command = BBN_DATA_PATH . 'plugins/appui-server/servers/'.$conf['mode'].'/'.$conf['host'].'.json';

  //die(\bbn\X::hdump($backup_command));
  if ( !is_file($backup_command) ){
    $vm = new \bbn\Api\Virtualmin($conf);
    $list_commands = $vm->listCommands(['short' => 1]);
    $get_commands = [];

    foreach($list_commands as $cmd ){
      $get_commands[$cmd['name']] = $vm->getCommand($cmd['name']);
    }

    file_put_contents($backup_command, Json_encode($get_commands));
  }
  else{
    $get_commands = json_decode(file_get_contents($backup_command), true);
  }
  return [
    'commands' => $get_commands
  ];
}

return [];
