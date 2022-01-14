<?php
if ($model->hasData(['name', 'code', 'user', 'pass1', 'pass2'], true)
  && ($idParent = $model->inc->options->fromCode('servers', 'server', 'appui'))
) {
  if ($model->data['pass1'] !== $model->data['pass2']) {
    return [
      'success' => false,
      'error' => _("The passwords don't match")
    ];
  }
  $psw = new \bbn\Appui\Passwords($model->db);
  $obj = [
    'id_parent' => $idParent,
    'text' => $model->data['name'],
    'code' => $model->data['code'],
    'user' => $model->data['user']
  ];
  if (!empty($model->data['cloudmin'])) {
    $obj['cloudmin'] = 1;
  }
  if ($id = $model->inc->options->add($obj)) {
    return [
      'success' => $psw->store($model->data['pass1'], $id)
    ];
  }
}
return ['success' => false];
