<?php

/** @var bbn\Mvc\Controller $ctrl */

if (!empty($ctrl->post['data']['server'])) {
  $server = \bbn\Str::isUid($ctrl->post['data']['server'])
    ? $ctrl->inc->options->code($ctrl->post['data']['server'])
    : $ctrl->post['data']['server'];
  if (!empty($server)) {
    $ctrl->addData(['server' => $server]);
    $ctrl->action();
  }
}
