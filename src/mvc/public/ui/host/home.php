<?php
// if ( !empty($ctrl->arguments[0]) ){
  // echo $ctrl->addData([
  //   'root' => APPUI_SERVER_ROOT,
  //   'server' => $ctrl->post['server'],
  // ])->combo(null, true);
  $ctrl->post['server'] = $ctrl->arguments[0];
  $ctrl->addData([
    'root' => APPUI_SERVER_ROOT,
    'server' => $ctrl->post['server'],
    'domain' => $ctrl->post['domain'],
    'domains' => $ctrl->reroute(APPUI_SERVER_ROOT.'data/server/home', $ctrl->post)
    'root_dashboard' =>  APPUI_SERVER_ROOT.'ui/server/home/'
  ])->combo(null, true);

  $ctrl->obj->url = APPUI_SERVER_ROOT.'ui/server/'.$ctrl->arguments[0]. '/home/';
