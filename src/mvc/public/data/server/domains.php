<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\mvc\controller */
if( !empty($ctrl->arguments[0]) ){
 // $ctrl->obj = $ctrl->get_object_model(['server' => $ctrl->arguments[0]]);
  $ctrl->obj = $ctrl->get_cached_model(['server' => $ctrl->arguments[0]], 400);
}