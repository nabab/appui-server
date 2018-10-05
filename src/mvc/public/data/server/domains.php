<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\mvc\controller */

if( !empty($ctrl->arguments[0]) ){
  $id_option = $ctrl->inc->options->from_code($ctrl->arguments[0], 'servers', 'server', BBN_APPUI);
  if ( !empty($id_option) ){
    $ctrl->obj = $ctrl->get_object_model(['id' => $id_option]);
    //$ctrl->obj = $ctrl->get_cached_model(['id' => $id_option], 400);
  }
}
