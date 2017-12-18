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
  $ctrl->obj->url = APPUI_SERVER_ROOT.'ui/server/'.$ctrl->post['server']. '/domain/'.$ctrl->post['domain'];
}