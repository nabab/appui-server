<?php

$cache     = \bbn\Cache::getEngine();
$cacheName = \bbn\Appui\Server::CACHE_NAME . '/domains';
if (!$cache->has($cacheName)) {
  \bbn\Appui\Server::makeGlobalDomainsCache();
}

if ($data = $cache->get($cacheName)) {
  return [
    'data' => $data,
    'total' => count($data)
  ];
}

return [];
