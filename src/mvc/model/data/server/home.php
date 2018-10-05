<?php
$list_domains = [];
$top_level = [];
$admins = [];
$all = [];
/*
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
*/

if( !empty($model->inc->vm) ){
  $infos_server = $model->inc->vm->info(['host' => $model->data["server"]]);
    foreach( $model->inc->vm->list_domains(['domain' => $server['text']]) as $v){
    if ( !empty($v['values']['server_block_quota']) ){
      if( $v['values']['server_block_quota'][0] !== "Unlimited" ){
        $rap_quota = ($v['values']['server_block_quota_used'][0] * 100) / $v['values']['server_block_quota'][0];
        $rap_quota = number_format($rap_quota, 2)."%";
      }
      else{
        $rap_quota = "unlimited";
      }
    }
    else{
     $rap_quota = "undefined"  ;
    }
    array_push($list_domains , [
      'name' => $v['name'],
      'rapport_quota' => $rap_quota
    ]);
  };
  $delimiters = [
    [
      'name' => 'cpu',
      'search' => 'cpu:',
      'st' => null
    ], [
      'name' => 'disk_free',
      'search' => 'disk_free:',
      'st' => null
    ], [
      'name' => 'disk_fs',
      'search' => 'disk_fs:',
      'st' => null
    ], [
      'name' => 'disk_total',
      'search' => 'disk_total:',
      'st' => null
    ],[
      'name' => 'fcount',
      'search' => 'fcount:',
      'st' => null
    ], [
      'name' => 'ftypes',
      'search' => 'ftypes:',
      'st' => null
    ],[
      'name' => 'host',
      'search' => 'host:',
      'st' => null
    ],[
      'name' => 'io',
      'search' => 'io:',
      'st' => null
    ], [
      'name' => 'kernel',
      'search' => 'kernel:',
      'st' => null
    ], [
      'name' => 'load',
      'search' => 'load:',
      'st' => null
    ], [
      'name' => 'maxquota',
      'search' => 'maxquota:',
      'st' => null
    ], [
      'name' => 'mem',
      'search' => 'mem:',
      'st' => null
    ], [
      'name' => 'progs',
      'search' => 'progs:',
      'st' => null
    ], [
      'name' => 'status',
      'search' => 'status:',
      'st' => null
    ]
  ];
  $informations = [];
  foreach ( $delimiters as $i => &$d ){
    if (
      (($pos = strpos($infos_server, ($i ? "\n" : '').$d['search'])) !== false) &&
      (($pos2 = strpos($infos_server, "\n".$delimiters[$i+1]['search'])) !== false)
    ){
      $d['st'] = substr($infos_server, $pos, $pos2 - $pos);
    }
    if ( strlen($d['st']) > 0 ){
      $informations[$d['name']] = [];
      if ($d['name'] === 'disk_fs'){
        $arr=  explode('*', $d['st']);
        unset($arr[0]);
        $arr= array_values($arr);
        foreach($arr as $v){
          $arrr = [];
          $x= explode("\n", $v);
          unset($x[0]);
          $x= array_values($x);
          foreach($x as $w){
            $w= str_replace(" ", "", $w);
            $strs= explode(":",$w);
            $arrr[$strs[0]]= $strs[1];
          }
          array_push($informations[$d['name']], $arrr);
        }
      }
      else{
      	if ( substr_count($d['st'], '*') > 0){
  				$informations[$d['name']] = explode('*', $d['st']);
          unset($informations[$d['name']][0]);
          $informations[$d['name']]= array_values($informations[$d['name']]);
          foreach($informations[$d['name']] as $i => $str){
            $str = str_replace("\n", "", $str);
            $str = str_replace(" ", "", $str);
            $informations[$d['name']][$i] = $str;
          }
        }
        else if ( substr_count($d['st'], ':') > 0 ){
          $fields = array_filter( explode("\n", $d['st']), function($val){
            return $val !== "";
          });
          foreach($fields as $y => $field){
            if ( ($pos = strpos($field, ":")) !== false ){
              $idx = str_replace(" ", "", substr($field, 0, $pos));
              $value = substr($field, $pos, strlen($field) - $pos);
              $value = str_replace(": ", "", $value);
              if( count($fields) > 1 ){
                $informations[$d['name']][$idx] = $value;
                if( ($idx === $d['name']) && $informations[$d['name']][$idx] === "" ){
                  unset($informations[$d['name']][$idx]);
                }
              }
              else{
                $informations[$d['name']]= $value;
              }
            }
          }
        }
      }
    }
  }

  //top--level
  foreach ( $model->inc->vm->list_domains(['toplevel' => 1]) as $i => $v ){
    //for items in bbns-widget
    if( $v['values']['server_block_quota'][0] !== "Unlimited" ){
      $rap_quota = ($v['values']['server_block_quota_used'][0] * 100) / $v['values']['server_block_quota'][0];
      $rap_quota = number_format($rap_quota, 2)."%";
    }
    else{
      $rap_quota = "unlimited";
    }


    array_push($admins, [
      'name' => $v['name'],
      'list_admins' => $model->inc->vm->list_admins(['domain' => $v['name']]),
    ]);

    $top_level = [
      'name' => $v['name'],
      'total_quota' => $v['values']['server_block_quota'][0],
      'quota_used' => $v['values']['server_block_quota_used'][0],
      'server_quota' => $v['values']['server_quota'][0],
      'serverquota_used' => $v['values']['server_quota_used'][0],
      'alert_quota' => (is_numeric($rap_quota) && ($rap_quota > 90)) ? true : false,
      'log' =>[
        'access_log' => $v['values']['access_log'][0],
        'error_log' => $v['values']['error_log'][0],
      ],
      'informations' => $v['values'],
      'list_admins' => $admins,
      'rapport_quota' => $rap_quota
    ];
  }

  //return
  if ( !empty($list_domains) || !empty($top_level) || !empty($informations) ){
    return [
      'list_domains' => $list_domains,
      'top_level' => $top_level,
      'info_server' => $informations,
      'success' => true
    ];
  }

}
return [
  'success' => false
];
