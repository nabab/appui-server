<?php
if ( isset($ctrl->post['server'], $ctrl->post['domain'], $ctrl->post['sub_domain']) ){
  $ctrl->add_data([
    'root' => APPUI_SERVER_ROOT,
    'server' => $ctrl->post['server'],
    'domain' => $ctrl->post['domain'],
    'sub_domain' => $ctrl->post['sub_domain']
  ])->combo($ctrl->post['sub_domain'], true);
}
$ctrl->obj->url = APPUI_SERVER_ROOT.'ui/server/'.$ctrl->arguments[0]. '/domain/'.$ctrl->arguments[2].(
	$ctrl->arguments[4] ? '/sub_domain/'.$ctrl->arguments[4] : 'subdomains');
