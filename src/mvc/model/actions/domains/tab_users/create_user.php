<?php

/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 24/03/17
 * Time: 11.28
 *
 * @var $ctrl \bbn\Mvc\Controller
 */


if( !empty($model->inc->vm) &&
  !empty($model->data['domain']) &&
  !empty($model->data['user']) &&
  !empty($model->data['pass'])
){
  $server = $model->inc->options->option($model->inc->options->fromCode($model->data['server'], 'servers', 'server', 'appui'));


  $list = [
    'all-domains' => 1,
    'domain' => $model->data['domain'],
    'domain-user' => $server['user'],
    'email-only' => 1,
    'include-owner' => 1,
    'multiline' => 1,
    'name-only' => 1,
    'simple-aliases' => 1
  ];
  $info_extra = ['extra', 'ftp', 'noemail'];

  $params = [
    'user' => $model->data['user'],
    'domain' => $model->data['domain'],
    'quota' => $model->data['quota'],
    'pass' => $model->data['pass'],
  ];

  foreach($info_extra as $v){
    if( !empty($model->data[$v]) &&
     ( ($model->data[$v] !== '') || ($model->data[$v] !== 0) )
    ){
      $params[$v] = $model->data[$v];
    }
  }

  $users = $model->inc->vm->list_users($list);

  if ( empty(array_search($model->data['user'], $users)) ){
    $model->inc->vm->createUser($params);
    if( !$model->inc->vm->error ){
      return [
        'success' => true,
        ];
    }
    else{
      return [
        'success' => false,
        'message_error' => $model->inc->vm->error
      ];
    }
  }
}

return ['success' => false];
