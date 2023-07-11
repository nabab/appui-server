<?php

use Exception;
use bbn\X;
use bbn\File\Dir;
use bbn\Api\Virtualmin;

if ( !empty($model->data['system']) ){
  $name_system = $model->data['system'];

  $info_system = $model->tmpPath('appui-server') . 'infos/'.$name_system.'.json';
  $info_system_temp = $model->tmpPath('appui-server') . 'infos/'.$name_system.'.temp.json';


  $generate_cache = function(string $cache, string $name_system) use ($model){

    if ( !is_file($cache) ){

      $backup_lan = $model->tmpPath('appui-server') . 'into_lan.text';

      $text = file_get_contents($backup_lan);
      $cred = explode(',', $text);

      if ( is_array($cred) ){
        $conf = [
          'user' => constant('BBN_DB_USER'),
          'pass' => $cred[0],
          'host' => $cred[1],
          'mode' => $cred[2]
        ];
      }

      $vm = new Virtualmin($conf);

      foreach( $vm->listSystems() as $val){
        if ( $val['name'] === $name_system ){
          $system = $val;
          break;
        }
      }
      if (empty($system)) {
        throw new Exception(X::_('Impossible to find the system'));
      }
      $domains = $vm->list_domains(['host'=> $system['name']]);
      $check_dns = [];

      foreach($domains as $domain){
        $check_dns[$domain['name']] = $vm->check_dns_zone(['domain' => $domain['name']]);
      }

      $infos =  array_merge($system['values'], [
        'list_backup_logs'  => $vm->list_backup_logs(['host'=> $system['name']]),
        'list_bandwidth' => $vm->list_bandwidth(['host'=> $system['name']]),
        'list_citrix_cds' => $vm->list_citrix_cds(['host'=> $system['name']]),
        'list_citrix_templates' => $vm->list_citrix_templates(['host'=> $system['name']]),
        'list_directory' => $vm->list_directory(['host'=> $system['name']]),
        'list_disk_storages' => $vm->list_disk_storages(['host'=> $system['name']]),
        'list_disks' => $vm->list_disks(['host'=> $system['name']]),
        'list_dns_records' => $vm->list_dns_records(['host'=> $system['name']]),
        'list_docker_images' => $vm->list_docker_images(['host'=> $system['name']]),
        'list_docker_volumes' => $vm->list_docker_volumes(['host'=> $system['name']]),
        'list_domains' => $domains,
        'list_interfaces' => $vm->list_interfaces(['host'=> $system['name']]),
        'list_lxc_templates' => $vm->list_lxc_templates(['host'=> $system['name']]),
        'list_openvz_templates' => $vm->list_openvz_templates(['host'=> $system['name']]),
        'list_processes' => $vm->list_processes(['host'=> $system['name']]),
        'list_provision_history' => $vm->list_provision_history(['host'=> $system['name']]),
        'list_provision_mysql_users' => $vm->list_provision_mysql_users(['host'=> $system['name']]),
        'list_reverse_addresses' => $vm->list_reverse_addresses(['host'=> $system['name']]),
        'list_snapshots' => $vm->list_snapshots(['host'=> $system['name']]),
        'list_status_history' => $vm->list_status_history(['host'=> $system['name']]),
        'list_system_history' => $vm->list_system_history(['host'=> $system['name']]),
        'list_system_keys' => $vm->list_system_keys(['host'=> $system['name']]),
        'list_updates' => $vm->list_updates(['host'=> $system['name']]),
        'list_usage' => $vm->list_usage(['host'=> $system['name']]),
        'check_dns' => $check_dns
      ]);

      if ( $system['name'] === 'cloudmin.lan' ){
        $infos =  array_merge($infos,[
          'list_ec2_accounts' => $vm->list_ec2_accounts(),
          'list_ec2_addresses' => $vm->list_ec2_addresses(),
          'list_ec2_availability_zones' => $vm->list_ec2_availability_zones(),
          'list_ec2_images' => $vm->list_ec2_images(),
          'list_ec2_sizes'=> $vm->list_ec2_sizes(),
          'list_ec2_snapshots' => $vm->list_ec2_snapshots(),
          'list_ec2_subnets' => $vm->list_ec2_subnets(),
          'list_ec2_volumes' => $vm->list_ec2_volumes(),
          'list_gce_disks' => $vm->list_gce_disks(),
          'list_gce_images' => $vm->list_gce_images(),
          'list_gce_networks'=> $vm->list_gce_networks(),
          'list_gce_projects'=> $vm->list_gce_projects(),
          'list_gce_sizes' => $vm->list_gce_sizes(),
          'list_gce_snapshots' => $vm->list_gce_zones(),
          'list_gce_zones' => $vm->list_gce_zones(),
          'list_images' => $vm->list_images(),
          'list_licences' => $vm->list_licences(),
          'list_locations' => $vm->list_locations(),
          'list_owner_bandwidth' => $vm->list_owner_bandwidth(),
          'list_plans' => $vm->list_plans(),
          'list_provision_features' => $vm->list_provision_features(),
          'list_roundrobins' => $vm->list_roundrobins(),
          'list_scalegroups' => $vm->list_scalegroups(),
          'list_ssh_keys' => $vm->list_ssh_keys(),
          'list_system_locks' => $vm->list_system_locks(),
          'list_systems' => $vm->listSystems()
        ]);
      }


      foreach( $infos as $key => $val ){
        if( (strpos($key, 'login') > -1) || (strpos($key, 'password') > -1) ){
          unset($infos[$key]);
        }
      }

      if ( (file_put_contents($cache, Json_encode($infos)) !== false) ){
        return true;
      }
    }
    return false;
  };

  if ( !is_file($info_system) ){
    if ( $generate_cache($info_system, $name_system) ){
      return ['success' => true ];
    }
  }
  else{
    if ( $generate_cache($info_system_temp, $name_system) ){
      if ( is_file($info_system_temp) ){
        if ( Dir::move($info_system_temp, $info_system, true) ){
          return['success' => true];
        }
      }
    }
  }

}
return ['success' => false];
