<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\mvc\controller */

//$ctrl->data['root'] = $ctrl->plugin_url('appui-server').'/';
if ( !\defined('APPUI_SERVER_ROOT') ){
  define('APPUI_SERVER_ROOT', $ctrl->plugin_url('appui-server').'/');
}
//bindtextdomain('appui_task', BBN_LIB_PATH.'bbn/appui-task/src/locale');
//setlocale(LC_ALL, "fr_FR.utf8");

textdomain('appui_server');

return 1;