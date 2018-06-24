<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\mvc\controller */

if( !empty($ctrl->inc->vm) &&
  !empty($ctrl->arguments[0]) &&
  !empty($ctrl->arguments[1]) &&
  !empty($ctrl->arguments[2])
){
  $ctrl->obj = $ctrl->get_object_model([
    'server' => $ctrl->arguments[0],
    'domain' => $ctrl->arguments[1],
    'sub_domain' => $ctrl->arguments[2]
  ]);
}
