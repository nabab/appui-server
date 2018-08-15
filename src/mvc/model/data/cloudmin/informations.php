<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.37
 */

if ( !empty($model->data['id']) ){
  $server = $model->inc->options->option($model->data['id']);
  $conf = [
    'user' => $server['user'],
    'pass' => $server['pass'],
    'host' => $server['text'],
    'mode' => 'cloudmin'
  ];
  $vm = new \bbn\api\virtualmin($conf);

  //$domains = $vm->list_commands();
  $domains = $vm->list_systems();


  //
  // $names = array_map(function($a){ return $a['name'];}, $domains);
  // $names = array_filter($names, function($a){ return strpos($a, 'list') !== false;});
  // sort($names);

  return [
    // 'data' => $conf,
    // 'cf' => $names,
    'ddd' => $domains
  ];
}
