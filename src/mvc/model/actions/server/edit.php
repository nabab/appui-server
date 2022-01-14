<?php
if ($model->hasData(['id', 'name', 'code', 'user', 'pass1', 'pass2'], true)) {
  if ($model->data['pass1'] !== $model->data['pass2']) {
    return [
      'success' => false,
      'error' => _("The passwords don't match")
    ];
  }
  $psw = new \bbn\Appui\Passwords($model->db);
  $currentPass = $psw->get($model->data['id']);
  $obj = [
    'text' => $model->data['name'],
    'code' => $model->data['code'],
    'user' => $model->data['user']
  ];
  if (!empty($model->data['cloudmin'])) {
    $obj['cloudmin'] = 1;
  }
  $ok1 = $model->inc->options->set($model->data['id'], $obj);
  $ok2 = false;
  if ($currentPass !== $model->data['pass1']) {
    $ok2 = $psw->store($model->data['pass1'], $model->data['id']);
  }
  return [
    'success' => !empty($ok1) || !empty($ok2)
  ];
}
return [
  'success' => false
];
