<?php
//configuration object virtualmin or cloudmin
if(!empty($ctrl->post) && !empty($ctrl->post['server'])) {
  $serverName = $ctrl->post['server'];
}
else if (!empty($ctrl->arguments) && !empty($ctrl->arguments[0])) {
  $serverName = $ctrl->arguments[0];
}

if (!empty($serverName)
  && ($idOption = $ctrl->inc->options->fromCode($serverName, 'servers', 'server', BBN_APPUI))
){
  
  $server = $ctrl->inc->options->option($idOption);
  $ctrl->addInc('vm', new \bbn\Api\Virtualmin([
    'user' => $server['user'],
    'pass' => $ctrl->inc->psw->get($idOption),
    'host' => $server['text'],
    'mode' => empty($server['cloudmin']) ? 'virtualmin' : 'cloudmin'
  ]));
}
return 1;
