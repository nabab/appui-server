<?php

if( !empty($ctrl->inc->vm) ){
  $ctrl->obj = $ctrl->getObjectModel([
    'server' => $ctrl->post['server']
  ]);
}
