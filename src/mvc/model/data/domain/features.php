<?php

if ($model->hasData(['server', 'type'], true)) {
  try {
    $server = new \bbn\Appui\Server($model->data['server']);
  }
  catch (Exception $e) {
    return ['success' => false];
  }

  switch ($model->data['type']) {
    case 'top':
      $features = $server->getCache('features_template');
      break;
    case 'sub':
      if (!empty($model->data['domain'])) {
        $features = $server->getCache('features_template', false, $model->data['domain']);
      }
      break;
    case 'alias':
      if (!empty($model->data['domain'])) {
        $features = $server->getCache('features_template', false, $model->data['domain']);
      }
      break;
  }

  return [
    'success' => true,
    'data' => !empty($features) ? $features : []
  ];
}
return ['success' => false];
