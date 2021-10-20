<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.49
 */
if (!empty($ctrl->arguments[0])
  && ($opt = $ctrl->inc->options->option($ctrl->arguments[0], 'server', 'appui'))
) {
  $ctrl
  ->addData([
    'root' => APPUI_SERVER_ROOT,
  ])
  ->setUrl(APPUI_SERVER_ROOT.'ui/cloudmin')
  ->setColor('dodgerblue', 'white')
  ->setIcon('nf nf-fae-cloud')
  ->combo($opt['text'], true);
}


