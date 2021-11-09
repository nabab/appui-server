<?php

if ($servers  = $ctrl->inc->options->options('servers', 'server', 'appui')) {
  // Create servers cache
  foreach ($servers as $server) {
    try {
      $s = new \bbn\Appui\Server($server);
      $s->makeCache();
    }
    catch (Exception $e) {
      echo " Didn't connect to $server" . PHP_EOL;
    }
  }

  // Create global domains cache
  \bbn\Appui\Server::makeGlobalDomainsCache();
}
