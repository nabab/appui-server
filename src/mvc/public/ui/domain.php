<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.49
 */

if (!empty($ctrl->post['server']) && !empty($ctrl->post['domain'])) {
  $ctrl
    ->addData([
      'root' => APPUI_SERVER_ROOT,
      'server' => $ctrl->post['server'],
      'domain' => $ctrl->post['domain']
    ])
    ->setUrl(APPUI_SERVER_ROOT . 'ui/server/' . $ctrl->arguments[0] . '/domain/' . $ctrl->arguments[2])
    ->combo($ctrl->post['domain'], true);
}