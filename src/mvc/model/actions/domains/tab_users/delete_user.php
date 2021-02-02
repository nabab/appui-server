<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 24/03/17
 * Time: 19.58
 *
 * @var $ctrl \bbn\Mvc\Controller
 */

if( !empty($model->inc->vm) &&
  !empty($model->data['domain']) &&
  !empty($model->data['user'])
){

  $params = [
    'domain' => $model->data['domain'],
    'user' => $model->data['user'],
  ];

  $model->inc->vm->deleteUser($params);
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
