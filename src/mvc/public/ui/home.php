<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 12.49
 */

$ctrl->addData([
  'root' => APPUI_SERVER_ROOT,
  'servers' => array_map(function($ele){
    return ['name' => $ele['text']];
  }, $ctrl->inc->options->fullOptions('servers', 'server', BBN_APPUI))
])->combo(null, true);
