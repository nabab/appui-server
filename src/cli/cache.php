<?php

if ($servers  = $ctrl->inc->options->options('servers', 'server', 'appui')) {
  // Create servers cache
  /*foreach ($servers as $server) {
    try {
      echo $server;
      $s = new \bbn\Appui\Server($server);
      $s->makeCache();
      echo ' OK' . PHP_EOL;
    }
    catch (Exception $e) {
      echo " Didn't connect to $server" . PHP_EOL;
    }
  }*/

  // Create global domains cache
  \bbn\Appui\Server::makeGlobalDomainsCache();
}
