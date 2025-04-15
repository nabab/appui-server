<?php

if( !empty($model->inc->vm) &&
  !empty($model->inc->options) &&
  !empty($model->data['server']) &&
  (!empty($model->data['tab']) || !empty($model->data['toplevel']))
){

  $server = $model->inc->options->option($model->inc->options->fromCode($model->data['server'], 'servers', 'server', 'appui'));

  $cmds = [
    'list_domains' => [],
    'list_users' =>  [
      'all-domains' => 1,
      'domain-user' => $server['user'],
      'domain' => $server['text'],
      'email-only' => 1,
      'include-owner' => 1,
      'multiline' => 1,
      'name-only' => 1,
      'simple-aliases' => 1,
    ],
    'list_commands' => ['short' => 1]
  ];
  //delete all cache files of the tabs domain (click tab domain)
  if ( !empty($model->data['toplevel']) ){
    foreach($cmds as $cmd => $args){
      $model->inc->vm->deleteCache($cmd, [$args]);
    }
    return [ 'success' => true];
  }
  //delte single files cache concerning single tab
  else{
    //case delete cache dashboard domain (tab Home)
    if ( $model->data['tab'] === "dashboard" ){}
    //case delete cache list sub-domains or  information (tab sub-domains and tab information)
    if ( ($model->data['tab'] === "sub-domains") || ($model->data['tab'] === "informations")){
      $model->inc->vm->deleteCache('list_domains', [$cmds['list_domains']]);
    }
    //case delete cache list users in domain (tab users)
    if ( $model->data['tab'] === "users" ){
      $model->inc->vm->deleteCache('list_users', [$cmds['list_users']]);
    }
    //case delete cache list command in server (tab Commands)
    if ( $model->data['tab'] === "commands" ){
      $model->inc->vm->deleteCache('list_commands', [$cmds['list_commands']]);
    }
  }
  return ['success' => true];
}
return ['success' => false];
