<?php

if( !empty($ctrl->inc->vm) &&
  !empty($ctrl->arguments[0]) &&
  !empty($ctrl->arguments[1])
){
  $ctrl->obj = $ctrl->getCachedModel([
   'server' => $ctrl->arguments[0],
   'domain' => $ctrl->arguments[1]
  ], 400);
}
