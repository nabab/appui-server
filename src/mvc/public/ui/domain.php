<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.49
 */



if ( isset($ctrl->post['server'], $ctrl->post['domain']) ){
  echo $ctrl->add_data([
    'root' => APPUI_SERVER_ROOT,
    'server' => $ctrl->post['server'],
    'domain' => $ctrl->post['domain']
  ])->combo($ctrl->post['domain'], true);
}
$ctrl->obj->url = APPUI_SERVER_ROOT.'ui/server/'.$ctrl->arguments[0]. (
  $ctrl->arguments[2] ? '/domain/'.$ctrl->arguments[2] : '/domains'
);
//$ctrl->obj->url = APPUI_SERVER_ROOT.'ui/server/'.$ctrl->arguments[0];
if ( !empty($ctrl->arguments[3]) ){
  $ctrl->obj->url .= '/'.$ctrl->arguments[3];
}
