<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 31/03/17
 * Time: 11.27
 *
 * @var $ctrl \bbn\mvc\controller
 */

die(var_dump("cccd"));
$pswd = "";
$usr = "";


if( !empty($ctrl->post['domain']) &&
    !empty($ctrl->post['host'])
){
  $conf =[
    'user' => $usr,
    'pass' => $pswd,
    'host' => $ctrl->post['host']
  ];

  $vm = new \bbn\api\virtualmin($conf);


    $params = [];
    $host = $ctrl->post['host'];

    unset( $ctrl->post['host'] );
    $params = $ctrl->post;



   $vm->modify_user($params);

  if ( !$vm->error ){

    $list = [
      'all-domains' => 1,
      'domain' => $host,
      'domain-user' => $usr,
      'email-only' => 1,
      'include-owner' => 1,
      'multiline' => 1,
      'name-only' => 1,
      'simple-aliases' => 1
    ];

    if ( $users = $vm->list_users($list) ){

      $ctrl->obj->data['email_users'] = $users;
    }
    else {
      $ctrl->obj->error = $vm->error;
    }


  }
  else{
    $ctrl->obj->data['error'] = $vm->error;
  }
}
