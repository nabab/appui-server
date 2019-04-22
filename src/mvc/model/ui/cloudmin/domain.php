<?php

  $vm = new \bbn\api\virtualmin([
    'user' => BBN_DB_USER,
    'pass' => BBN_DB_PASS,
    'host' => $model->data['system'],
    'mode' => 'virtualmin'
  ]);

  $domain = $vm->list_domains(['domain' => $model->data['domain']]);

  $users = $vm->list_users([
    'domain' => $model->data['domain']
  ]);

  return [
    'domain' => !empty($domain) ? $domain[0] : [],
    'users' => !empty($users) ? $users : []
  ];
