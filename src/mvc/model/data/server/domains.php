<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.38
 */

$tot = 0;
$all = [];
if ( !empty($model->data['id']) &&  !empty($model->inc->vm) ){
  $server = $model->inc->options->option($model->data['id']);
  $domains = $model->inc->vm->list_domains(['domain' => $server['text'], 'toplevel' => 1]);
  foreach ( $domains as $i => $v ){
    $users = "";
    $parms_list =  [
      'all-domains' => 1,
      'domain' => $v['name'],
      'domain-user' => $server['user'],
      'email-only' => 1,
      'include-owner' => 1,
      'multiline' => 1,
      'name-only' => 1,
      'simple-aliases' => 1,
    ];
    $all_users = $model->inc->vm->list_users($parms_list);
    if( !empty($all_users) ){
      foreach ( $all_users as $val ){
        if ( $val['values']['domain'][0] == $v['name'] ){
          $users .= $val['name']. "  ";
        }
      }
    }
    else{
      $users = " ";
    }

      array_push($all, [
        'server' => $server['text'],
        'domain' => $v['name'],
        'disabled' => isset($v['values']['disabled']) ? true : false,
        'users' => $users,
        'created' => $v['values']['created_on'][0],
        'total_info' => $v['values'],
      ]);
      $tot = $tot + 1;

  }
}
return [
  'data' => $all,
  'tot' => $tot
];
