(()=>{
  return {
    methods:{
      stateButtonSubDomain(row){
        if( row.disabled === true ){
          return [{
            text: bbn._("Enable Sub-domain"),
            class:'enableBtn',
            action: this.enableSubDomain,
            notext: true,
            icon: 'nf nf-fa-play',
          }];
        }
        else{
          return [{
            text: bbn._("Disable Sub-domain"),
            action: this.disableSubDomain,
            notext: true,
            class:"disableBtn",
            icon: 'nf nf-fa-power_off',
          }];
        }
      },
      renderSubDomain(row){
        return '<a href="' + this.source.root + 'ui/server/' + this.source.server + '/domain/' + this.source.domain + '/subdomain/' + row.sub_domains +'"><span>' + row.sub_domains + '</span></a>';
      },
      editSubDomain(){
        alert("edit");
      },
      cloneSubDomain(){
        alert("clone");
      },
      deleteSubDomain(){
        alert("delete");
      },
      disableSubDomain(row){
        appui.confirm(bbn._("Are you sure you want to disabled domain") + " " + row.sub_domains + " ?", ()=>{
          this.post(this.root + 'actions/domains/tab_sub_domains/state_sub_domain', {
            server: this.server,
            state: "disable",
            domain: row.sub_domains
          },(d) =>{
            if ( d.success ){
              appui.success(bbn._("disabled"));
            }
          });
        });
      },
      enableSubDomain(row){
        appui.confirm(bbn._("Are you sure you want to enabled domain") + " " + row.sub_domains + " ?", ()=>{
          this.post(this.root + 'actions/domains/tab_sub_domains/state_sub_domain', {
            server: this.server,
            state: "enable",
            domain: row.sub_domains
          },(d) =>{
            if ( d.success ){
              appui.success(bbn._("enable"));
            }
          });
        });
      },
    },
    created(){
      //for add in menu of the tab delete cache
      this.closest("bbn-container").addMenu({
        text: bbn._("Delete cache"),
        icon: "nf nf-fa-trash_alt_alt",
        action:()=>{
          this.post(this.source.root + 'actions/domains/delete_cache',{
            server: this.source.server,
            domain: this.source.domain,
            tab:"sub-domains"
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
              this.$refs.listSubDomainsTable.updateData();
            }
          });
        }
      });
    },
    components: {
      'newSubDomain':{
        template:`<bbn-button @click="addSubDomain" icon="nf nf-fa-plus"></bbn-button>`,
        methods:{
          addSubDomain(){
            alert("new SubDomain");
          }
        }
      }
    }
  }
})();
