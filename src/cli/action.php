<?php
\bbn\X::log([$ctrl->post, $ctrl->get], 'mirko');
if (!empty($ctrl->post['id'])
  && !empty($ctrl->post['server'])
  && !empty($ctrl->post['method'])
  && empty($ctrl->post['start'])
  && empty($ctrl->post['failed'])
) {
  $server = new \bbn\Appui\Server($ctrl->post['server']);
  if (method_exists($server, $ctrl->post['method'])
    && $server->setQueueTaskStart($ctrl->post['id'])
  ) {
    $args = !empty($ctrl->post['args']) ? json_decode($ctrl->post['args'], true) : [];
    if (!$server->{$ctrl->post['method']}(...$args)) {
      $server->setQueueTaskFailed($ctrl->post['id'], $server->getLastError());
    }
    $server->setQueueTaskEnd($ctrl->post['id']);
  }
  else {
    $server->setQueueTaskFailed($ctrl->post['id'], _('Method not found or task already started'));
  }
}