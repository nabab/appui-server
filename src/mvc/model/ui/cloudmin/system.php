<?php

if ( !empty($model->data['system']) ){
  $info_system = $model->tmpPath('appui-server') . 'infos/'.$model->data['system'].'.json';

  if ( is_file($info_system) ){
    return json_decode(file_get_contents($info_system), true);
  }
  else{
    $res = $model->getModel($model->pluginUrl('appui-server') . 'actions/generate_cache', ['system' => $model->data['system']]);
    if ( ($res['success'] === true) && is_file($info_system) ){
      return json_decode(file_get_contents($info_system), true);
    }
  }
}
return [];
