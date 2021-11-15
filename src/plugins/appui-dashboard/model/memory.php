<?php

if ($model->hasData('server', true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return [];
  }

  if ($data = $server->getCache('mem', $model->hasData('force', true))) {
    foreach ($data as $i => $m) {
      switch ($i) {
        case 0:
          $data['realTotal'] = $m;
          break;
        case 1:
          $data['realUsed'] = $m;
          break;
        case 2:
          $data['swapTotal'] = $m;
          break;
        case 3:
          $data['swapUsed'] = $m;
          break;
        case 4:
          $data['cached'] = $m;
          break;
      }

      unset($data[$i]);
    }

    return [
      'items' => $data
    ];
  }
}

return [];
