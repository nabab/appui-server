<?php
$res['success'] = false;

if ( !empty($model->inc->vm) &&
  !empty($model->data['id_server']) &&
  !empty($model->data['domain'])
){
  $server = $model->inc->options->option($model->data['id_server']);
  $parms_list =  [
    'all-domains' => 1,
    'domain-user' => $server['user'],
    'domain' => $server['text'],
    'email-only' => 1,
    'include-owner' => 1,
    'multiline' => 1,
    'name-only' => 1,
    'simple-aliases' => 1,
  ];
  $arr = $model->inc->vm->list_users($parms_list);
  $users = [];
  foreach($arr as $usr ){
    if ( !empty($usr['values']['domain']) &&
      ($usr['values']['domain'][0] === $model->data['domain'])
    ){
      array_push($users,[
        'user' => $usr['name'],
        'ftp_user' => $usr['values']['ftp_access'][0],
        'total_byte_quota' => $usr['values']['home_byte_quota'][0],
        'total_byte_quota_used' => $usr['values']['home_byte_quota_used'][0],
        'total_quota' => $usr['values']['home_quota'][0],
        'total_quota_used' => $usr['values']['home_quota_used'][0],
        'email_address' => $usr['values']['email_address'][0],
        'extra_addresses' => $usr['values']['extra_addresses'][0],
        'last_logins' => $usr['values']['last_logins'][0],
        'disabled' => $usr['values']['disabled'][0],
        'total_info' => $usr['values'],
        'email_autoreply' => !empty($usr['values']['autoreply_message']) ? $usr['values']['autoreply_message'] : "",
        'autoreply_start' => !empty($usr['values']['autoreply_start']) ? $usr['values']['autoreply_start'] : "",
        'autoreply_end' => !empty($usr['values']['autoreply_end']) ? $usr['values']['autoreply_end'] : ""
      ]);
    }
  }
  $res= [
    'success' => true,
    'data' => $users
  ];
}

return $res;
