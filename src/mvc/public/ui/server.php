<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.49
 */


/*
 * center where the various tabnavs are placed
 */

if ( $ctrl->baseURL === APPUI_SERVER_ROOT.'ui/' ){
  //case for main server
  if ( empty($ctrl->arguments[1]) ){
 
    $ctrl->add_data([
      'root' => APPUI_SERVER_ROOT,
      'server' => $ctrl->arguments[0],
      'root_server' => APPUI_SERVER_ROOT.'ui/server/'.$ctrl->arguments[0]
    ])->combo($ctrl->arguments[0], true);
    $ctrl->obj->url = 'server/'.$ctrl->arguments[0];
  }

  //case go domain
  else if( !empty($ctrl->arguments[1]) && empty($ctrl->arguments[4]) ){
    \bbn\x::log($ctrl->arguments, 'vito');
  //  die(\bbn\x::dump($ctrl->arguments));
    $ar = [
      'server' => $ctrl->arguments[0],
      'domain' => $ctrl->arguments[2]
    ];
    if ( $ctrl->arguments[1] !== 'home' ){
      if ( $ar['server'] !== 'cloudmin.lan' ){
        $ctrl->reroute(APPUI_SERVER_ROOT.'ui/domain', $ar, $ctrl->arguments);
      }
    }
  }
  //go sub-domain
  else{
    $ar = [
      'server' => $ctrl->arguments[0],
      'domain' => $ctrl->arguments[2],
      'sub_domain' => $ctrl->arguments[4],
    ];
    if( $ar['server'] !== 'cloudmin.lan' ){
      $ctrl->reroute(APPUI_SERVER_ROOT.'ui/sub_domain', $ar, $ctrl->arguments);
    }
  }
}
