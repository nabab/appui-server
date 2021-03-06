<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 15.23
 */

$tot = 0;
$all = [];

if (!empty($model->inc->vm) &&
  !empty($model->data['domain']) &&
  !empty($model->data['sub_domain'])
){
  $cmd = $model->inc->vm->listCommands(['short' => 1]);
  foreach($cmd as $val){
    array_push($all, [
      'command' => $val['name'],
      'category' => $val['values']['category'][0],
      'description' => $val['values']['description'][0],
      'total_info' => $val['values'],  
    ]);
    $tot = $tot + 1;
  }
}

return [
  'data' => $all,
  'tot' => $tot
];
