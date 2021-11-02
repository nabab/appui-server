<?php
/*
 * Describe what it does!
 *
 **/

/** @var $this \bbn\Mvc\Controller */

if (!\defined('APPUI_SERVER_ROOT')) {
  define('APPUI_SERVER_ROOT', $ctrl->pluginUrl('appui-server') . '/');
}

if (!isset($ctrl->inc->psw)) {
  $ctrl->addInc("psw", new \bbn\Appui\Passwords($ctrl->db));
}

$server = '';

if (!empty($ctrl->post['server'])) {
  $server = $ctrl->post['server'];
}
elseif (!empty($ctrl->post['data']) && !empty($ctrl->post['data']['server'])) {
  $server = $ctrl->post['data']['server'];
}

$serverId = $server;
$user     = @$ctrl->post['user'];
if (\bbn\Str::isUid($serverId)) {
  $server = $ctrl->inc->options->code($serverId);
}
else {
  $o        = $ctrl->inc->options->option($server, 'servers', 'server', BBN_APPUI);
  $server   = $o['code'];
  $serverId = $o['id'];
  $user     = $o['user'];
}

if (!empty($server) && !empty($serverId)) {
  if (empty($user)) {
    $user = $ctrl->inc->options->getProp($serverId, 'user');
  }

  if (!empty($user) && ($pass = $ctrl->inc->psw->get($serverId))) {
    $ctrl->addInc('vm', new \bbn\Api\Virtualmin([
      'user' => $user,
      'pass' => $pass,
      'host' => $server,
      'mode' => 'virtualmin'
    ]));
  }
}

return 1;
