<?php

if ( !empty($ctrl->post['domain']) ){
  $ctrl->obj->bcolor = "#babfbb";
  $ctrl->add_data([
    'root' => APPUI_SERVER_ROOT,
    'system' => $ctrl->post['system'],    
  ])->combo($ctrl->post['domain'], true);

  $ctrl->obj->url = APPUI_SERVER_ROOT.'ui/cloudmin/system/'.$ctrl->post['system'].'/' .'domain/'.$ctrl->post['domain'];
}
