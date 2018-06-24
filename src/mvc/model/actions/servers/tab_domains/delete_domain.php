<?php

if( !empty($model->inc->vm) &&
  !empty($model->data['domain'])
){
  $params = [
    'domain' => []
  ];
  array_push($params['domain'], $model->data['domain']);
  $model->inc->vm->delete_domain($params);
  if ( !$model->inc->vm->error ){
    return ['success' => true];
  }
  else{
    return [
      'success' => false,
      'message_error' => $model->inc->vm->error
    ];
  }
}
return ['success' => false];
