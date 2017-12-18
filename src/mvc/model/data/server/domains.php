<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.38
 */


if ( !empty($model->data['server']) ){
  $conf = [
    'user' => 'bbn',
    'pass' => 'bbnsolutions',
    'host' => $model->data['server'] . ".lan"
  ];


  $vm = new \bbn\api\virtualmin($conf);
  $domains = $vm->list_domains();


  $tot = 0;
  $all = [];

  foreach ( $domains as $i => $v ){
    $users = "";
    $parms_list =  [
      'all-domains' => 1,
      'domain' => $v['name'],
      'domain-user' => $conf['user'],
      'email-only' => 1,
      'include-owner' => 1,
      'multiline' => 1,
      'name-only' => 1,
      'simple-aliases' => 1,
    ];
    $all_users = $vm->list_users($parms_list);
    if( !empty($all_users) ){
      foreach ( $all_users as $j => $val ){
        if ( $val['values']['domain'][0] == $v['name'] ){
          $users .= $val['name']. "  ";
        }
      }
    }
    else{
      $users = " ";
    }

    array_push($all, [
      'server' => $conf['host'],
      'domain' => $v['name'],
      'users' => $users
    ]);
    $tot = $tot + 1;
  }

  return [
    'data' => $all,
    'tot' => $tot
  ];

}
