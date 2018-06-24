<?php

if( !empty($ctrl->inc->vm) ){
  $ctrl->obj = $ctrl->get_object_model([
    'server' => $ctrl->post['server']
  ]);
}
