<?php
if (!empty($ctrl->post['server']) && !empty($ctrl->post['domain']) && !empty($ctrl->post['subdomain'])) {
  $ctrl
    ->addData([
      'root' => APPUI_SERVER_ROOT,
      'server' => $ctrl->post['server'],
      'domain' => $ctrl->post['domain'],
      'subdomain' => $ctrl->post['subdomain']
    ])
    ->setUrl(APPUI_SERVER_ROOT . 'ui/server/' . $ctrl->arguments[0] . '/domain/'.$ctrl->arguments[2] . '/subdomain/' . $ctrl->arguments[4])
    ->combo($ctrl->post['subdomain'], true);
}
