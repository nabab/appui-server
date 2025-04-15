<?php

if( !empty($model->inc->vm) &&
  !empty($model->inc->options) &&
  !empty($model->data['server']) &&
  (!empty($model->data['tab']) || !empty($model->data['toplevel']))
){

  $server = $model->inc->options->option($model->inc->options->fromCode($model->data['server'], 'servers', 'server', 'appui'));
  //delete all cache files of server (click tab server)
  if ( !empty($model->data['toplevel']) ){
    $folder = $model->cachePath()."bbn/api/virtualmin/";
    $content_cache = array_diff(scandir($folder), ['..', '.']);
    foreach( $content_cache as $ele ){
      if ( strpos($ele, $model->data['server']) !== false ){
        if ( is_dir($folder.$ele) ){
          // \bbn\X::log($folder, 'cache_delete');
          \bbn\File\Dir::delete($folder.$ele);
        }
      }
    }
      return [ 'success' => true];
  }
  //delte single files cache concerning single tab
  else{
    //case delete cache dashboard server (tab Home)
    if ( !empty($model->data['data_domains']) && ($model->data['tab'] === "dashboard") ){
      $methods = [
        'info' => ['host' => $model->data['server']],
        'list_domains' => ['toplevel' => 1],
        'list_admins' => []
      ];
      foreach ($methods as $method => $args){
        if ( $method !== 'list_admins' ){
          $model->inc->vm->deleteCache($method, [$args]);
        }//case list_admins
        else{
          foreach ($model->data['data_domains'] as $i => $domain){
            $model->inc->vm->deleteCache('list_admins', [['domain' => $domain['name']]]);
          }
        }
      }
    }
    //case delete cache list domains in  server (tab Domains)
    if ( !empty($model->data['data_domains']) && ($model->data['tab'] === "domains") ){
      $methods = [
        'list_domains' => ['domain' => $model->data['server'], 'toplevel' => 1],
        'list_users' => []
      ];
      foreach ($methods as $method => $args){
        if ( $method !== 'list_users' ){
          $model->inc->vm->deleteCache($method, [$args]);
        }//case list_admins
        else{
          foreach ($model->data['data_domains'] as $i => $ele){
            //\bbn\X::log([$server['user'],$ele['domain'], $method], 'cache_delete');
            $model->inc->vm->deleteCache($method,[
              [
                'all-domains' => 1,
                'domain' => $ele['domain'],
                'domain-user' => $server['user'],
                'email-only' => 1,
                'include-owner' => 1,
                'multiline' => 1,
                'name-only' => 1,
                'simple-aliases' => 1,
              ]
            ]);
          }
        }
      }
    }
    //case delete cache list command in  server (tab Commands)
    if ( $model->data['tab'] === "commands" ){
      $model->inc->vm->deleteCache('list_commands');
    }
    //case delete cache informations in  server (tab information)
    if ( $model->data['tab'] === "informations" ){
      $model->inc->vm->deleteCache('list_domains', [['toplevel' => 1]]);
    }

  }

  return ['success' => true];
}
return ['success' => false];
