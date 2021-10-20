<?php
if ($model->hasData('server', true)
  && ($opt = $model->inc->options->option($model->data['server'], 'servers', 'server', 'appui'))
  && (!empty($opt['user']))
  && ($psw = new \bbn\Appui\Passwords($model->db))
  && ($pass = $psw->get($opt['id']))
  && ($vm = new \bbn\Api\Virtualmin([
    'user' => $opt['user'],
    'pass' => $pass,
    'host' => $opt['code'],
    'mode' => 'virtualmin'
  ]))
  && ($domains_top_level = $vm->list_domains(['toplevel' => 1]))
) {
  $domains_top_level = $model->inc->vm->list_domains(['toplevel' => 1]);
  if ( is_array($domains_top_level) && (count($domains_top_level) > 0) ){
    foreach ( $domains_top_level as $i => $v ){
      //for items in bbns-widget
      if( $v['values']['server_block_quota'][0] !== "Unlimited" ){
        $rap_quota = ($v['values']['server_block_quota_used'][0] * 100) / $v['values']['server_block_quota'][0];
        $rap_quota = number_format($rap_quota, 2)."%";
      }
      else{
        $rap_quota = "unlimited";
      }

      array_push($admins, [
        'name' => $v['name'],
        'list_admins' => $model->inc->vm->list_admins(['domain' => $v['name']]),
      ]);

      $top_level = [
        'name' => $v['name'],
        'total_quota' => $v['values']['server_block_quota'][0],
        'quota_used' => $v['values']['server_block_quota_used'][0],
        'server_quota' => $v['values']['server_quota'][0],
        'serverquota_used' => $v['values']['server_quota_used'][0],
        'alert_quota' => (is_numeric($rap_quota) && ($rap_quota > 90)) ? true : false,
        'log' =>[
          'access_log' => $v['values']['access_log'][0],
          'error_log' => $v['values']['error_log'][0],
        ],
        'informations' => $v['values'],
        'list_admins' => $admins,
        'rapport_quota' => $rap_quota
      ];
    }
  }
  return [
    'items' => $list_domains,
    'top_level' => $top_level
  ];
}
return [];
