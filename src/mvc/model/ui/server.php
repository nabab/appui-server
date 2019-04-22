<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 22/11/17
 * Time: 18.28
 */



$conf =[
  'user' => BBN_DB_USER,
  'pass' => BBN_DB_PASS,
  'host' => $model->data['server'].'.lan'
];

return [
    'site_url' => BBN_URL,
    'static_path' => BBN_STATIC_PATH,
    'shared_path' => BBN_SHARED_PATH,
    'server' => $model->data['server']
  ];
