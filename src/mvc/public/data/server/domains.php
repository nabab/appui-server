<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\Mvc\Controller */

if( !empty($ctrl->arguments[0]) ){
  $id_option = $ctrl->inc->options->fromCode($ctrl->arguments[0], 'servers', 'server', BBN_APPUI);
  if ( !empty($id_option) ){
    $ctrl->obj = $ctrl->getObjectModel(['id' => $id_option]);
    //$ctrl->obj = $ctrl->getCachedModel(['id' => $id_option], 400);
  }
}
