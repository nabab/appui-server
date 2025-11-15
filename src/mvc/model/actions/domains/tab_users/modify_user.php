<?php
use bbn\Str;
if( !empty($model->inc->vm) &&
  !empty($model->data['domain']) &&
  !empty($model->data['user'])
){
    $params = [];

    // for add or remore extra emails
    $extra_emails = explode(" ", $model->data['extra_email']);
    $extra_original_emails = explode(" ", $model->data['original_extra_email']);

    if ( count($extra_emails) > count($extra_original_emails) ){
      $emails = implode(" ",  array_diff($extra_emails, $extra_original_emails));
      if( !empty(Str::len($emails)) ){
        $params['add-email'] = $emails;
      }
    }
    if ( count($extra_emails) < count($extra_original_emails) ){
      $emails = implode(" ", array_diff($extra_original_emails, $extra_emails));
      if( !empty(Str::len($emails)) ){
        $params['remove-email'] = $emails;
      }
    }

    unset( $model->data['extra_email'] );
    unset( $model->data['original_extra_email'] );
    unset( $model->data['res'] );

    foreach($model->data as $prop => $val){
      if ( Str::pos($prop, "_") !== false){
         $prop =str_replace("_", "-", $prop);
      }
      $params[$prop] = $val;
    }
    
    $model->inc->vm->modify_user($params);
    if ( !$model->inc->vm->error ){
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
