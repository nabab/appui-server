<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 12.49
 */

 //for list server
  $id_servers = $ctrl->inc->options->from_code('servers', 'server', BBN_APPUI);
  echo $ctrl->add_data([
    'root' => APPUI_SERVER_ROOT,
    'root_dashboard' => APPUI_SERVER_ROOT.'ui/home/',
    'servers' => array_map(function($ele){
      return ['name' => $ele['text'] ];
    },$ctrl->inc->options->full_options($id_servers))
  ])->combo(null, true);
