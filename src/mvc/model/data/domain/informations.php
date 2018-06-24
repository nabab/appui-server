<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.38
 */

$tot = 0;
$all = [];
$infos= "";

if (!empty($model->inc->vm) &&
 !empty($model->data['server']) &&
 !empty($model->data['domain'])
){
  $selected_info = [
    'php_version',
    'user_quota_used',
    'server_quota_used',
    'ssl_key_file',
    'shell_type',
    'ssl_cert_file',
    'description'
  ];
  $domains = $model->inc->vm->list_domains();
  foreach($domains as $key => $val){

    if( $val['name'] === $model->data['domain'] ){
      foreach( $val['values'] as $j => $v ){
        foreach($selected_info as $value){
          if( $j === $value ){
            array_push($all, [
              'info' => $j,
              'value' => $v[0],
            ]);
            $tot = $tot + 1;
          }
        }
      }
      $infos = $val['values'];
    }
  }
}
return [
  'data' => $all,
  'total_info' => $infos,
  'tot' => $tot
];
