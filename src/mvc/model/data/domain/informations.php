<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.38
 */
if (!empty($model->data['server']) && !empty($model->data['domain']) ){
  $selected_info = [
    'php_version',
    'user_quota_used',
    'server_quota_used',
    'ssl_key_file',
    'shell_type',
    'ssl_cert_file',
  ];
  $conf = [
    'user' => 'bbn',
    'pass' => 'bbnsolutions',
    'host' => $model->data['server'] . ".lan"
  ];

  $vm = new \bbn\api\virtualmin($conf);
  $domains = $vm->list_domains();

  $tot = 0;
  $all = [];

  foreach($domains as $key => $val){

    if( $val['name'] === $model->data['domain'] ){
      foreach( $val['values'] as $j => $v ){
        foreach($selected_info as $value){
          if( $j === $value ){
            array_push($all, [
              'info' => $j,
              'value' => $v[0]
            ]);
            $tot = $tot + 1;
          }
        }
      }
    }
  }

  return [
    'data' => $all,
    'tot' => $tot
  ];
}


