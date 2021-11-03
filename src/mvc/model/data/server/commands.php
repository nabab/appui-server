<?php

$all = [];
if (!empty($model->inc->vm)) {
  $cmd = $model->inc->vm->listCommands();
  foreach ($cmd as $val) {
    $all[] = [
      'command' => $val['name'],
      'category' => $val['values']['category'][0],
      'description' => $val['values']['description'][0],
      'total_info' => $val['values']
    ];
  }

  return [
    'data' => $all,
    'tot' => count($all)
  ];
}
