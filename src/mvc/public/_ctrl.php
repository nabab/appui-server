<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\mvc\controller */

if ( !\defined('APPUI_SERVER_ROOT') ){
  define('APPUI_SERVER_ROOT', $ctrl->plugin_url('appui-server').'/');
  $ctrl->add_inc("psw", new \bbn\appui\passwords($ctrl->db));
}

return 1;