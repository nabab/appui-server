<?php
$res = [
  'root' => APPUI_SERVER_ROOT,
  //'servers' => $model->inc->options->fullOptions('servers', 'server', 'appui')
];
if (($dashboard = new \bbn\Appui\Dashboard('appui-server'))) {
  $res = array_merge($res, $dashboard->getUserWidgets($model->pluginUrl('appui-dashboard').'/data/'));
}
return $res;