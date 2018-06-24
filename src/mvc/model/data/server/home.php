<?php
$list_domains = [];
$admins = [];
$all = [];

if( !empty($model->inc->vm) ){
  $infos_server = $model->inc->vm->info(['host' => $model->data["server"]]);
  $domains = $model->inc->vm->list_domains(['toplevel' => 1]);



  //for dimension disk free server
  $pos_start = strpos($infos_server, "disk_free:")+11;
  $server['disk_free'] = substr($infos_server, $pos_start);
  $pos_end = strpos($server['disk_free'], "disk_total:")-1;
  $server['disk_free'] = (int)substr($server['disk_free'], 0 , $pos_end);

  //for dimension total disk server
  $pos_start = strpos($infos_server, "disk_total:")+12;
  $server['disk_total'] = substr($infos_server, $pos_start);
  $pos_end = strpos($server['disk_total'], "fcount:")-1;
  $server['disk_total'] = substr($server['disk_total'], 0 , $pos_end);

  $server['disk_occupated'] = (int)$server['disk_total'] - (int)$server['disk_free'];
  $server['free_space'] = number_format((($server['disk_free']*100)/$server['disk_total']), 2)."%";
  $server['busy_space'] = (100-$server['free_space'])."%";

//test get information system host
  $pos_start = strpos($infos_server, "host:");
  $info_system=substr($infos_server, $pos_start);
  $pos_end = strpos($info_system, "io:")-1;
  $info_system=substr($info_system,0, $pos_end);
  $os = substr($info_system,strpos($info_system, "os:")+3);
  $server['info']['os'] = substr($os , 0 ,strpos($os, "root:")-5);
  //\bbn\x::log($server['info'],"daataServer");


  foreach ( $domains as $i => $v ){
    //for items in bbns-widget
    if( $v['values']['server_block_quota'][0] !== "Unlimited" ){
      $rap_quota = ($v['values']['server_block_quota_used'][0] * 100) / $v['values']['server_block_quota'][0];
      $rap_quota = number_format($rap_quota, 2)."%";
    }
    else{
      $rap_quota = "unlimited";
    }

    array_push($list_domains, [
      'name' => $v['name'],
      'total_quota' => $v['values']['server_block_quota'][0],
      'quota_used' => $v['values']['server_block_quota_used'][0],
      'server_quota' => $v['values']['server_quota'][0],
      'serverquota_used' => $v['values']['server_quota_used'][0],
      'alert_quota' => (is_numeric($rap_quota) && ($rap_quota > 90)) ? true : false,
      'rapport_quota' => $rap_quota
    ]);
    array_push($admins, [
      'name' => $v['name'],
      'list_admins' => $model->inc->vm->list_admins(['domain' => $v['name']]),
    ]);
    //for source property in bbns-widget
    $all[$v['name']] = [
      'domain' => $v['name'],
      'access_log' => $v['values']['access_log'][0],
      'error_log' => $v['values']['error_log'][0],
      'total_info' => $v['values'],
      'list_admins' => $admins,
    ];
    $all['total_info_server'] = $server;
  }
  //\bbn\x::log([$list_domains, $all, $admins],"daataServer");
  if ( !empty($list_domains) || !empty($all) || !empty($admins) ){
    return [
      'domains' => $list_domains,
      'list_admins' => $admins,
      'all' => $all,
      'success' => true
    ];
  }
}
return [
  'success' => false
];