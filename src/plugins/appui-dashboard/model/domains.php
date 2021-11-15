<?php

$model->data['onlyParent'] = true;
return [
  'items' => $model->getModel($model->pluginUrl('appui-server') . '/data/server/domains', $model->data)['data']
];
