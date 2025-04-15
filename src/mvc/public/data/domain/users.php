<?php
if( !empty($ctrl->arguments[0]) &&
  !empty($id = $ctrl->inc->options->fromCode($ctrl->arguments[0], 'servers', 'server', 'appui')) &&
  !empty($ctrl->arguments[1])
){

  $ctrl->obj = $ctrl->getObjectModel([
   'id_server' => $id,
   'domain' => $ctrl->arguments[1]
 ]);
}
