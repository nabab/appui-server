<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 24/03/17
 * Time: 19.58
 *
 * @var $ctrl \bbn\mvc\controller
 */


$pswd = "";
$usr = "";

if( !empty($ctrl->data['vm']) &&
  !empty($ctrl->post['domain']) &&
  !empty($ctrl->post['user']) &&
  !empty($ctrl->post['host'])
){

  $params = [
    'domain' => $ctrl->post['domain'],
    'user' => $ctrl->post['user'],
  ];

  $ctrl->data['vm']->delete_user($params);


  if ( !$ctrl->data['vm']->error ){

    $list = [
      'all-domains' => 1,
      'domain' => $ctrl->post['host'],
      'domain-user' => $usr,
      'email-only' => 1,
      'include-owner' => 1,
      'multiline' => 1,
      'name-only' => 1,
      'simple-aliases' => 1
    ];

    if ( $users = $ctrl->data['vm']->list_users($list) ){
      $ctrl->obj->data['email_users'] = $users;
    }
    else {
      $ctrl->obj->error = $ctrl->data['vm']->error;
    }


  }
}
else{

}
