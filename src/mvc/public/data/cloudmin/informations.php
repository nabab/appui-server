<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.36
 */


if( !empty($ctrl->post['ele']) ){
  $id_option = $ctrl->inc->options->from_code($ctrl->post['ele'], 'servers', 'server', BBN_APPUI);
  $ctrl->obj = $ctrl->get_object_model(['id' => $id_option]);
 // $ctrl->obj = $ctrl->get_cached_model(['domain' => $ctrl->arguments[0]], 1500);
}
