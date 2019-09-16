(() => {
  return {
    props: {
      source: {
        type: Object
      }
    },
    data(){
      return {
        nameSystem: this.source.system,
        titleWidget:{
          realMemory: bbn._("Real memory") + ' ' + this.source.real_memory[0],
          diskQuota: bbn._("Disk quota") + ' ' + this.source.disk_space[0],
          status: bbn._("Status"),
          general: bbn._("General informations"),
          cpus: bbn._("CPUs"),
          domains: bbn._("Domains"),
          backups: bbn._("List backups")
        },
        general:{
          created: this.source.created !== undefined ? this.source.created[0] : '-',
          description: this.source.description !== undefined ? this.source.description[0] : '-',
          kernel_version: this.source.kernel_version !== undefined ? this.source.kernel_version[0] : '-',
          cpu_architectureu: this.source.cpu_architecture !== undefined ? this.source.cpu_architecture[0] : '-',
          mac_address: this.source.mac_address !== undefined ? this.source.mac_address[0] : '-',
          system_operation: this.source.os !== undefined ? this.source.os[0] : '-',
          type_system: this.source.type !== undefined ? this.source.type[0]: '-',
          type_code: this.source.type_code !== undefined ? this.source.type_code[0] : '-',
          ip_address: this.source.ip_address !== undefined ? this.source.ip_address[0] : '-',
          unix_hostname: this.source.unix_hostname !== undefined ? this.source.unix_hostname[0] : '-',
        },
        status:{
          status: this.source.status[0],
          status_changed: this.source.status_changed[0],
        },
        disk:{
          free: this.source.disk_space_free[0],
          occupated: this.source.disk_space_used[0],
          total: this.source.disk_space[0],
        },
        ram:{
          free: this.source.real_memory_free[0],
          occupated: this.source.real_memory_used[0],
          total: this.source.real_memory[0]
        },
        virtual_memory:{
          free: this.source.virtual_memory_free[0],
          occupated: this.source.virtual_memory_used[0],
          total: this.source.virtual_memory[0],
        },
        cpus: {
          list: this.source.cpu_load[0].split(" ")
        },
        domains: {
          list: this.source.list_domains
        }
      }
    },
    // created(){
    //   //for add in menu of the tab delete cache
    //   this.closest("bbns-container").addMenu({
    //     text: bbn._('Delete cache'),
    //     icon: "nf nf-fa-trash_alt_alt",
    //     command:()=>{
    //       this.post(this.source.root + 'actions/delete_cache',{
    //         system: this.source.system
    //       }, d => {
    //         if ( d.success ){
    //           appui.success(bbn._("Delete"));
    //         }
    //       });
    //     }
    //   });
    //}
  }
})();
