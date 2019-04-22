(()=>{
  return {
    data(){
      return{
        systems: [],
        root: appui.plugins['appui-server']
      }
    },
    methods:{
      renderSystem(row){
         return  '<a href="'+ this.root +'/ui/cloudmin/system/' + row.name + '">' +
                    row.name +
                  '</a>';
      },
      renderType(row){
        if ( (row.values.type !== undefined) && row.values.type.length ){
          return row.values.type[0];
        }
        return '-';
      },
      renderOs(row){
        if ( (row.values.os !== undefined) && row.values.os.length ){
          return row.values.os[0];
        }
        return '-';
      },
      renderIp(row){
        if ( (row.values.ip_address !== undefined) && row.values.ip_address.length ){
          return row.values.ip_address[0];
        }
        return '-';
      },
      renderMac(row){
        if ( (row.values.mac_address !== undefined) && row.values.mac_address.length ){
          return row.values.mac_address[0];
        }
        return '-';
      },
      renderTotDomains(row){
        if ( (row.values.domains !== undefined) && row.values.domains.length ){
          return row.values.domains.length;
        }
        return '-';
      },
      renderRealMemory(row){
        if ( (row.values.real_memory !== undefined) && row.values.real_memory.length ){
          return row.values.real_memory[0];
        }
        return "-";
      },
      renderDiskSpace(row){
        if ( (row.values.disk_space_used === undefined) || (row.values.disk_space === undefined) ){
          return '-';
        }
        else{
          return row.values.disk_space_used + ' / ' + row.values.disk_space;
        }
      },
      renderUpdates(row){
        if ( (row.values.list_updates !== undefined) && row.values.list_updates.length ){
          return  `<span style="color:red">${row.values.list_updates.length}</span>`
        }
        else {
          return '-';
        }
      },
      renderBackups(row){
        if ( (row.values.list_backups !== undefined) && row.values.list_backups.length ){
          return row.values.list_backups.length;
        }
        else {
          return `<i class="nf nf-fa-times_circle" style="color:red"></i>`
        }
      },
    }
  }
})();
