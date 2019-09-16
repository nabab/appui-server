/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.11
 */
(() => {
  let top_domains;
  return {
    methods:{
      renderDomain(row){
        bbn.fn.log( this.source.root+ 'ui/server/' + this.source.server + '/domains/' + row.domain )
        return '<a href="'+ this.source.root+ 'ui/server/' + this.source.server + '/domains/' + row.domain + '">' + row.domain + '</a>';
      },
      stateButtonDomain(row){
        if( row.disabled === true ){
          return [{
            text: bbn._("Enable Domain"),
            class:'enableBtn',
            command: this.enableDomain,
            notext: true,
            icon: 'nf nf-fa-play',
          }];
        }
        else{
          return [{
            text: bbn._("Disable Domain"),
            command: this.disableDomain,
            notext: true,
            class:"disableBtn",
            icon: 'nf nf-fa-power_off',
          }];
        }
      },
      disableDomain(row){
        appui.confirm(bbn._("Are you sure you want to disabled domain") + " " + row.domain + " ?", ()=>{
          this.post(this.root + 'actions/servers/tab_domains/state_domain', {
            server: this.source.server,
            state: "disable",
            domain: row.domain
          }, (d)=>{
            if ( d.success ){
              appui.success(bbn._("disabled"));
              this.$refs.domainsListTable.updateData();
            }
          });
        });
      },
      enableDomain(row){
        appui.confirm(bbn._("Are you sure you want to enabled domain") + " " + row.domain + " ?", ()=>{
          this.post(this.root + 'actions/servers/tab_domains/state_domain', {
            server: this.source.server,
            state: "enable",
            domain: row.domain
          }, (d)=>{
            if ( d.success ){
              appui.success(bbn._("enable"));
              this.$refs.domainsListTable.updateData();
            }
          });
        });
      },
      editDomain(row, col, idx){
        return this.$refs.domainsListTable.edit(row, {
          title: bbn._('Modify domain') + ' ' + row.doamin,
          height: '70%',
          width: '50%',
          // onClose: () =>{
          //   this.$refs.domainsListTable.updateData();
          // }
        }, idx);
      },
      cloneDomain(row){
        this.getPopup().open({
            height: '20%',
            width: '40%',
            title: bbn._("Duplicate") + " " + row.domain,
            component: 'appui-server-popup-server-domain-duplicate',
            source:{
              root: this.root,
              server: this.server,
              domain: row.domain
            },
            onClose: () =>{
              this.$refs.domainsListTable.updateData();
            }
        });
      },
      deleteDomain(row){
        this.confirm(bbn._("Are you sure you want to delete the domain") + " " + row.domain  + " " + bbn._("?"), ()=>{
          this.post(this.source.root + 'actions/servers/tab_domains/delete_domain', {
              server: this.source.server,
              domain: row.domain,
            }, d => {
            if ( d.success ){
              appui.success(bbn._('Deleted') + ' ' + row.domain );
              this.$refs.domainsListTable.updateData();
            }
            else {
              appui.error(bbn._("Error"));
            }
          });
        });
      }
    },
    created(){
      //for add in menu of the tab delete cache
      bbn.vue.closest(this, "bbn-container").addMenu({
        text: bbn._("Delete cache"),
        icon: "nf nf-fa-trash_alt_alt",
        command:()=>{
          let domains = this.$refs.domainsListTable.currentData.slice();
          this.post(this.source.root + 'actions/servers/delete_cache',{
            server: this.source.server,
            tab:"domains",
            data_domains: domains
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
              this.$refs.domainsListTable.updateData();
            }
          });
        }
      });
    },
    components: {
      'newDomain':{
        template:`<bbn-button :title="title_button" @click="addDomain" icon="nf nf-fa-plus"></bbn-button>`,
        data(){
          return {
            title_button: bbn._('New domain')
          }
        },
        methods:{
          addDomain(){
            this.getPopup().open({
              height: '70%',
              width: '50%',
              title: bbn._("Add new domain"),
              component: 'appui-server-popup-server-domain-add',
              source:top_domains,
              // onClose: () =>{
              //   bbn.vue.closest(this,'bbn-table').updateData()
              // }
            });
          }
        }
      }
    }
  };
})();
