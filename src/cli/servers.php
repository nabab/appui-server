<?php
if ($servers  = $ctrl->inc->options->fullOptions('servers', 'server', 'appui')) {
  foreach ($servers as $server) {
    if (!empty($server['user'])) {
      $ctrl->getModel(
        $ctrl->pluginUrl().'/actions/cache',
        [
          'server' => $server['id'],
          'user' => $server['user']
        ]
      );
    }
  }
}
