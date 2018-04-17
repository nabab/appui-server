<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 17.05
 */

return ['data' => [
  ['id' => 1, 'name' => 'apps'],
  ['id' => 2, 'name' => 'apst'],
  ['id' => 3, 'name' => 'cdn'],
  ['id' => 4, 'name' => 'thomas'],
  ['id' => 5, 'name' => 'vito'],
  ['id' => 6, 'name' => 'loredana']
]];



$list = ['apps','apst','cdn','thomas','vito','loredana'];
$config = [];
$cfgTemporaney = [];
$pswd = "";
$usr = "";
foreach ($list as $name){
  $conf =[
    'user' => $usr,
    'pass' => $pswd,
    'host' => $name.".lan"
  ];
  $parms_list =  [
    'all-domains' => 1,
    'domain' => $conf['host'],
    'domain-user' => $conf['user'],
    'email-only' => 1,
    'include-owner' => 1,
    'multiline' => 1,
    'name-only' => 1,
    'simple-aliases' => 1,
  ];
  $vm = new \bbn\api\virtualmin($conf);

  $sub_domains = $vm->list_domains();
  $config[] = [
    'name' => $name,
    'user' => $usr,
    'pass' => $pswd,
    'host' => $name.".lan",
    'domains' => $sub_domains,
    'link' => "https://".$name.".lan:10000",
    'cmds' => ( $vm->list_commands() ) ? $vm->list_commands() : $vm->error,
    'email_users' => ( $vm->list_users($parms_list) ) ? $vm->list_users($parms_list) : $vm->error
  ];
}
$res = [
  'root' => APPUI_SERVER_ROOT,
  'site_url' => BBN_URL,
  'static_path' => BBN_STATIC_PATH,
  'shared_path' => BBN_SHARED_PATH,
  'img_path' => BBN_IMG_PATH,
  'list_server' => $list,
  'name' => $list,
  'cfg' => $config,
  'list_users' =>[]
];



return $res;
