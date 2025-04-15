<?php
/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 24/03/17
 * Time: 11.18
 *
 * @var $ctrl \bbn\Mvc\Controller
 */

return 1;
 
 //configuration object virtualmin or cloudmin
 if ( !empty($ctrl->post) &&
     !empty($ctrl->post['server']) &&
     !empty($id_option = $ctrl->inc->options->fromCode($ctrl->post['server'], 'servers', 'server', 'appui'))
 ){
   $server = $ctrl->inc->options->option($id_option);
   $ctrl->addInc('vm', new \bbn\Api\Virtualmin([
     'user' => $server['user'],
     'pass' => $server['pass'],
     'host' => $server['text'],
     'mode' => empty($server['cloudmin']) ? 'virtualmin' : 'cloudmin'
   ]));

 }
 return 1;
