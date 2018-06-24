<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 15.23
 */

if( !empty($ctrl->arguments[0]) ){
  if ( !empty($ctrl->inc->vm) ){
    $ctrl->obj = $ctrl->get_object_model();
  }
}
