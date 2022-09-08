<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.49
 */

if (defined('BBN_BASEURL') && !empty($ctrl->arguments[0])) {
  if (BBN_BASEURL === APPUI_SERVER_ROOT . 'ui/') {
    $ctrl
      ->addData([
        'root' => APPUI_SERVER_ROOT,
        'server' => $ctrl->arguments[0]
      ])
      ->setUrl(APPUI_SERVER_ROOT . 'ui/server/' . $ctrl->arguments[0])
      ->combo($ctrl->arguments[0], true);
  }
  else if (BBN_BASEURL === APPUI_SERVER_ROOT . 'ui/server/' . $ctrl->arguments[0] . '/') {
    $ctrl->reroute(APPUI_SERVER_ROOT.'ui/domain', [
      'server' => $ctrl->arguments[0],
      'domain' => $ctrl->arguments[2]
    ], $ctrl->arguments);
  }
  else if (BBN_BASEURL === APPUI_SERVER_ROOT . 'ui/server/' . $ctrl->arguments[0] . '/domain/' . $ctrl->arguments[2] . '/') {
    $ctrl->reroute(APPUI_SERVER_ROOT.'ui/subdomain', [
      'server' => $ctrl->arguments[0],
      'domain' => $ctrl->arguments[2],
      'subdomain' => $ctrl->arguments[4]
    ], $ctrl->arguments);
  }
/*
  //case go domain
  else if( !empty($ctrl->arguments[1]) && empty($ctrl->arguments[4]) ){
    \bbn\X::log($ctrl->arguments, 'vito');
  //  die(\bbn\X::dump($ctrl->arguments));
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
  */
}