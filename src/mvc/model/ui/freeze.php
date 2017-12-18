<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 22/11/17
 * Time: 18.28
 */

//die(var_dump($model->data));
$conf =[
  'user' => 'bbn',
  'pass' => 'bbnsolutions',
  'host' => $model->data['domain']
];

return [
    'site_url' => BBN_URL,
    'static_path' => BBN_STATIC_PATH,
    'shared_path' => BBN_SHARED_PATH,
    'domain' => $model->data['domain']
  ];

