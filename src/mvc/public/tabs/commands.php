<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 15.23
 */
if( !empty($ctrl->arguments[0]) ){
  // $ctrl->obj = $ctrl->get_model(['server' => $ctrl->arguments[0]]);
  $ctrl->obj = $ctrl->get_cached_model(['server' => $ctrl->arguments[0]], 1500);
}
