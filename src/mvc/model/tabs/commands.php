<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 15.23
 */

if ( !empty($model->data['server']) ){
  $conf = [
    'user' => 'bbn',
    'pass' => 'bbnsolutions',
    'host' => $model->data['server'] . ".lan"
  ];

  $vm = new \bbn\api\virtualmin($conf);

  $cmd = $vm->list_commands();

  $tot = 0;
  $all = [];

  foreach($cmd as $val){
    array_push($all, [
      'command' => $val['name'],
      'category' => $val['values']['category'][0],
      'description' => $val['values']['description'][0],
    ]);
    $tot = $tot + 1;
  }

  return [
    'data' => $all,
    'tot' => $tot
  ];
}
