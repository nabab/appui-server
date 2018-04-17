<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.37
 */

if ( !empty($model->data['domain']) ){
  $selected_info = [
    'php_version',
    'user_quota_used',
    'server_quota_used',
    'ssl_key_file',
    'shell_type',
    'ssl_cert_file',
  ];
  $conf = [
    'user' => '',
    'pass' => '',
    'host' => $model->data['domain'] . ".lan"
  ];

  $vm = new \bbn\api\virtualmin($conf);
  $domains = $vm->list_domains();

  $tot = 0;
  $all = [];

  /*foreach($domains[0]['values'] as $key => $val){
    if( $key !== 'hashed_password' ){
      array_push($all, [
        'info' => $key,
        'value' => $val[0]
      ]);
      $tot = $tot + 1;
    }
  }*/
  foreach($domains[0]['values'] as $key => $val){
    foreach($selected_info as $value){
      if( $key === $value ){
        array_push($all, [
          'info' => $key,
          'value' => $val[0]
        ]);
        $tot = $tot + 1;
      }
    }
  }

  return [
    'data' => $all,
    'tot' => $tot
  ];
}
