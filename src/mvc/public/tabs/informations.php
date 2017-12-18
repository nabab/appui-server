<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.36
 */



if( !empty($ctrl->arguments[0]) ){

  $ctrl->obj = $ctrl->get_object_model(['domain' => $ctrl->arguments[0]]);
 // $ctrl->obj = $ctrl->get_cached_model(['domain' => $ctrl->arguments[0]], 1500);
}
