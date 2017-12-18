<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 16.05
 */

if ( !empty($ctrl->post['server']) ){
  //die(\bbn\x::hdump($ctrl->post['server']));
  $ctrl->obj = $ctrl->get_object_model($ctrl->post);
}