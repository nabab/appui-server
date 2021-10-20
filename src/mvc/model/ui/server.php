<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 22/11/17
 * Time: 18.28
 */

if (($dashboard = new \bbn\Appui\Dashboard('appui-server-server'))) {
  $widgets = $dashboard->getUserWidgetsCode($model->pluginUrl('appui-dashboard').'/data/');
  $widgets = [
    'list' => $widgets,
    'order' => $dashboard->getOrder($widgets)
  ];
}
return [
  'widgets' => @$widgets,
  'server' => $model->data['server']
];
