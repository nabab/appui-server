<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.49
 */

if ( !empty($ctrl->arguments[0]) ){
  echo $ctrl->add_data([
    'root' => APPUI_SERVER_ROOT,
    'server' => $ctrl->arguments[0],
  ])->combo($ctrl->arguments[0], true);
}
$ctrl->obj->bcolor="#35C01D";
$ctrl->obj->url = APPUI_SERVER_ROOT.'ui/server/'.$ctrl->arguments[0];
