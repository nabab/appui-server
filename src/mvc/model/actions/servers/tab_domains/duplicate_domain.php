<?php

if( !empty($model->inc->vm) &&
  !empty($model->data['server']) &&
  !empty($model->data['domain']) &&
  !empty($model->data['newdomain'])
){

  $model->inc->vm->clone_domain([
    'domain' => $model->data['domain'],
    'newdomain' => $model->data['newdomain'],
  ]);

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
