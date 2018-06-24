<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 22/11/17
 * Time: 18.28
 */

//die(var_dump($model->data));

$conf =[
  'user' => BBN_DB_USER,
  'pass' => BBN_DB_PASS,
  'host' => $model->data['server'].'.lan'
];

//$vm = new \bbn\api\virtualmin($conf);

/*
$config = [
  'host' => $conf['host'],
  'domains' => $vm->list_domains(),
  'link' => "https://".$model->data['server'].".lan:10000",
  'cmds' => ( $vm->list_commands() ) ? $vm->list_commands() : $vm->error,
  'email_users' => ( $vm->list_users($parms_list) ) ? $vm->list_users($parms_list) : $vm->error
];
*/

return [
    'site_url' => BBN_URL,
    'static_path' => BBN_STATIC_PATH,
    'shared_path' => BBN_SHARED_PATH,
    'server' => $model->data['server']
  ];
