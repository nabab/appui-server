<?php
if ($model->hasData('id', true)) {
  $psw = new \bbn\Appui\Passwords($model->db);
  return [
    'success' => true,
    'pass' => $psw->get($model->data['id']) ?: ''
  ];
}
return ['success' => false];
