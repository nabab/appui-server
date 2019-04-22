<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.49
 */

//case system

if ( !empty($ctrl->arguments[0]) ){
  if ( $ctrl->baseURL === 'server/ui/cloudmin/' ){
    $ctrl->obj->bcolor = "#afffcc";
    $ctrl->add_data([
      'root' => APPUI_SERVER_ROOT,
      'system' => $ctrl->arguments[0],
      ])->combo($ctrl->arguments[0], true);
      $ctrl->obj->url = APPUI_SERVER_ROOT.'ui/cloudmin/system/'.$ctrl->arguments[0];
  }
  else if ( !empty($ctrl->arguments[1]) && ($ctrl->arguments[1] === 'domain') && !empty($ctrl->arguments[2]) ){
    $ctrl->reroute(APPUI_SERVER_ROOT.'ui/cloudmin/domain', [
      'root' => APPUI_SERVER_ROOT,
      'system' => $ctrl->arguments[0],
      'domain' => $ctrl->arguments[2]
    ], $ctrl->arguments);
  }
}
