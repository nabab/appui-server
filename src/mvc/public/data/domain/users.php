<?php
if( !empty($ctrl->arguments[0]) &&
  !empty($id = $ctrl->inc->options->from_code($ctrl->arguments[0], 'servers', 'server', BBN_APPUI)) &&
  !empty($ctrl->arguments[1])
){

  $ctrl->obj = $ctrl->get_object_model([
   'id_server' => $id,
   'domain' => $ctrl->arguments[1]
 ]);
}
