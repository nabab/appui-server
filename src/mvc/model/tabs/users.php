<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 16.06
 */

$res['success'] = false;

if ( !empty($model->data['server']) ){
  $conf = [
    'user' => '',
    'pass' => '',
    'host' => $model->data['server'] . ".lan"
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

  $users = $vm->list_users($parms_list);

  $res= [
    'success' => true,
    'users' => $users
  ];
}

return $res;
