<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.49
 */


if ( $ctrl->baseURL === APPUI_SERVER_ROOT.'ui/' ){

  echo $ctrl->add_data([
    'root' => APPUI_SERVER_ROOT,
    'server' => $ctrl->arguments[0],
    'root_server' => APPUI_SERVER_ROOT.'ui/server/'.$ctrl->arguments[0],
    //'id_server' => $ctrl->arguments[0]
  ])->combo($ctrl->arguments[0], true);
  $ctrl->obj->url = $ctrl->data['root_server'];
}
else {
  $ar = [
    'server' => $ctrl->arguments[0],
    'domain' => $ctrl->arguments[2]
  ];
  $ctrl->reroute(APPUI_SERVER_ROOT.'ui/domain', $ar, $ctrl->arguments);
}

