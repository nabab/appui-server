<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\Mvc\Controller */

if ( !\defined('APPUI_SERVER_ROOT') ){
  define('APPUI_SERVER_ROOT', $ctrl->pluginUrl('appui-server').'/');
  $ctrl->addInc("psw", new \bbn\Appui\Passwords($ctrl->db));
}

return 1;