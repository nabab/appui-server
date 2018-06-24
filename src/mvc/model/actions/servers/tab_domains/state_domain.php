<?php
if( !empty($model->inc->vm) &&
  !empty($model->data['state']) &&
  !empty($model->data['domain'])
){

   //disable domain
  if( $model->data['state'] === 'disable' ){
    $model->inc->vm->disable_domain(['domain' => $model->data['domain']]);
  }
  //enable domain
  if( $model->data['state'] === 'enable' ){
    $model->inc->vm->enable_domain(['domain' => $model->data['domain']]);
  }

  if( !$model->inc->vm->error ){
    return [
      'success' => true
    ];
  }
  else{
    return [
      'success' => false,
      'message_error' => $model->inc->vm->error
    ];
  }

}
return [
  'success' => false
];
