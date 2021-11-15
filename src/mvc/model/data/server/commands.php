<?php

if (!empty($model->data['data']['server'])) {
  try {
    $server = new \bbn\Appui\Server($model->data['data']['server']);
  }
  catch (Exception $e) {
    return [];
  }

  if ($cmds = $server->getVirtualmin()->listCommands()) {
    foreach ($cmds as $i => $d) {
      $cmds[$i] = [
        'command' => $d['name'],
        'category' => $d['values']['category'][0],
        'description' => $d['values']['description'][0]
      ];
    }

    return [
      'data' => $cmds,
      'total' => count($cmds)
    ];
  }
}

return [];
