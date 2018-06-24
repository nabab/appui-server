<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 24/03/17
 * Time: 11.18
 *
 * @var $ctrl \bbn\mvc\controller
 */


 
 //configuration object virtualmin or cloudmin
 if ( !empty($ctrl->post) &&
     !empty($ctrl->post['server']) &&
     !empty($id_option = $ctrl->inc->options->from_code($ctrl->post['server'], 'servers', 'server', BBN_APPUI))
 ){
   $server = $ctrl->inc->options->option($id_option);
   $ctrl->add_inc('vm', new \bbn\api\virtualmin([
     'user' => $server['user'],
     'pass' => $server['pass'],
     'host' => $server['text'],
     'mode' => empty($server['cloudmin']) ? 'virtualmin' : 'cloudmin'
   ]));

 }
 return 1;
