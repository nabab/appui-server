<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.36
 */

if( !empty($ctrl->arguments[0]) &&
  !empty($ctrl->inc->vm)
){
  $id_option = $ctrl->inc->options->fromCode($ctrl->arguments[0], 'servers', 'server', BBN_APPUI);
  if ( !empty($id_option) ){
    $ctrl->obj = $ctrl->getObjectModel([
      'id' => $id_option,
      'domain' => $ctrl->arguments[0]  
    ]);
  }
}
 // $ctrl->obj = $ctrl->getCachedModel(['domain' => $ctrl->arguments[0]], 1500);
