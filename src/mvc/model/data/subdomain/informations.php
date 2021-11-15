<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 14.38
 */

 $tot = 0;
 $all = [];
 $infos = "";
 if (!empty($model->inc->vm)
  && !empty($model->data['server'])
  && !empty($model->data['domain'])
  && !empty($model->data['sub_domain'])
 ){
  $selected_info = [
    'created_by',
    'created_on',
    'features',
    'ip_address',
    'parent_domain',
    'plugins',
    'php_version',
    'php_max_execution_time',
    'user_quota_used',
    'server_quota_used',
    'ssl_key_file',
    'ssl_shared_with',
    'shell_type',
    'ssl_cert_file',
    'username',
    'group_id',
    'url'
  ];

  $domains = $model->inc->vm->list_domains([
    'multiline' => 1
  ]);

  if (is_array($domains)) {
    foreach ($domains as $key => $val) {
      if ($val['name'] === $model->data['sub_domain']) {
        foreach ( $val['values'] as $j => $v ) {
          foreach ($selected_info as $value) {
            if ( $j === $value ) {
              array_push($all, [
                'info' => $j,
                'value' => $v[0],
              ]);
              $tot++;
            }
          }
        }
        $infos = $val['values'];
      }
    }
  }
}

return [
  'data' => $all,
  'total_info' => $infos,
  'tot' => $tot
];
