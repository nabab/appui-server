<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.49
 */

$ctrl->addData([
  'root' => APPUI_SERVER_ROOT,
])->combo('Cloudmin', true);

$ctrl->obj->url = APPUI_SERVER_ROOT.'ui/cloudmin';
