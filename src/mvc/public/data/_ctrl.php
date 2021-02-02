<?php
//configuration object virtualmin or cloudmin
if( !empty($ctrl->post) && !empty($ctrl->post['server']) ){
  $name_server = $ctrl->post['server'];
}
else if ( !empty($ctrl->arguments) && !empty($ctrl->arguments[0])
){
  $name_server = $ctrl->arguments[0];
}

if ( !empty($name_server) &&
 !empty($id_option = $ctrl->inc->options->fromCode($name_server, 'servers', 'server', BBN_APPUI))
){
  $server = $ctrl->inc->options->option($id_option);
  $ctrl->addInc('vm', new \bbn\Api\Virtualmin([
    'user' => $server['user'],
    'pass' => $ctrl->inc->psw->get($id_option),
    'host' => $server['text'],
    'mode' => empty($server['cloudmin']) ? 'virtualmin' : 'cloudmin'
  ]));
}
return 1;
