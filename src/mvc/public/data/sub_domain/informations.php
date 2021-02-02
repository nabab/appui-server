<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\Mvc\Controller */

if( !empty($ctrl->inc->vm) &&
  !empty($ctrl->arguments[0]) &&
  !empty($ctrl->arguments[1]) &&
  !empty($ctrl->arguments[2])
){
  $ctrl->obj = $ctrl->getObjectModel([
    'server' => $ctrl->arguments[0],
    'domain' => $ctrl->arguments[1],
    'sub_domain' => $ctrl->arguments[2]
  ]);
}
