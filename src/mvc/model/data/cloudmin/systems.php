<?php
$backup = BBN_DATA_PATH . 'plugins/appui-server/into.text';
//$backup_lan = BBN_DATA_PATH . 'plugins/appui-server/into_lan.text';


$backup_lan_id = $model->inc->options->from_code('cloudmin', 'server', BBN_APPUI);
$cred = $model->inc->options->option($backup_lan_id);

$psw =  new \bbn\appui\passwords($model->db);


//$text = file_get_contents($backup_lan);

//$cred = explode(',', $text);
if ( is_array($cred) ){
  /*$conf = [
    'user' => BBN_DB_USER,
    'pass' => $cred[0],
    'host' => $cred[1],
    'mode' => $cred[2]
  ];*/
  $conf = [
    'user' => $cred['user'],
    'pass' => $psw->get($backup_lan_id),
    'host' => $cred['host'],
    'mode' => $cred['mode']
  ];
  
  $vm = new \bbn\api\virtualmin($conf);
// liste systems

  $systems = $vm->list_systems();

  if ( !empty($systems) ){
    foreach($systems as $k => $system){
      // get list domains, updates and list backup
      if ( !empty($system['name']) ){
        $domains = [];
        $updates = [];
        $backups = [];
        //domains
        $domains = $vm->list_domains(['host'=> $systems[$k]['name']]);

        //updates
        $updates = array_map(function($v){
          return $v['name'];
        },$vm->list_updates(['host'=> $systems[$k]['name']]));

        //backups
        $backups = $vm->list_backup_logs(['host'=> $systems[$k]['name']]);

        foreach( $domains as $i => $domain ){
          foreach( $domains[$i]['values'] as $idx => $v ){
            if( (strpos($idx, 'login') > -1) || (strpos($idx, 'password') > -1) ){
              unset($domains[$i]['values'][$idx]);
            }
          };
        }
      }
      if ( !empty($system['values']) ){
        foreach( $systems[$k]['values'] as $key => $val ){
          if( (strpos($key, 'login') > -1) || (strpos($key, 'password') > -1) ){
            unset($systems[$k]['values'][$key]);
          }
        };
      }
      $systems[$k]['values']['domains'] = isset($domains) ? $domains : [];
      $systems[$k]['values']['list_updates'] = isset($updates) ? $updates : [];
      $systems[$k]['values']['list_backups'] = isset($backups) ? $backups : [];
    }
  }
  return [
    'data' => $systems,
  ];
}
return [];
