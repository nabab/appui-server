<?php

$model->data['onlyParent'] = true;
return $model->getModel($model->pluginUrl('appui-server') . '/data/server/domains', $model->data);
