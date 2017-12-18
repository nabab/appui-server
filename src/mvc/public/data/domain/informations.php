<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\mvc\controller */
//die(var_dump('dds',$ctrl->arguments ));

if( !empty($ctrl->arguments[0]) && !empty($ctrl->arguments[1]) ){
  $ar = [
    'server' => $ctrl->arguments[0],
    'domain' => $ctrl->arguments[1]
  ];
  $ctrl->obj = $ctrl->get_object_model($ar);

 // $ctrl->obj = $ctrl->get_cached_model(['server' => $ctrl->arguments[0]], 400);
}