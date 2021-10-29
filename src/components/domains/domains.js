/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.11
 */
(() => {
  let top_domains;
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/'
      }
    },
    methods:{
      renderDomain(row){
        return `<a href="${this.root}ui/server/${this.source.server}/domain/${row.name}">${row.name}</a>`;
      },
      renderParent(row){
        return !!row.parent ? `<a href="${this.root}ui/server/${this.source.server}/domain/${row.parent}">${row.parent}</a>` : '';
      },
      renderUsers(row){
        return bbn.fn.map(row.users, user => user.name).join(', ');
      },
      stateButtonDomain(row){
        if( row.disabled === true ){
          return [{
            text: bbn._("Enable Domain"),
            class:'enableBtn',
            action: this.enableDomain,
            notext: true,
            icon: 'nf nf-fa-play',
          }];
        }
        else{
          return [{
            text: bbn._("Disable Domain"),
            action: this.disableDomain,
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
              this.getRef('table').updateData();
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
              this.getRef('table').updateData();
            }
          });
        });
      },
      editDomain(row, col, idx){
        return this.getRef('table').edit(row, {
          title: bbn._('Modify domain') + ' ' + row.doamin,
          height: '70%',
          width: '50%',
          // onClose: () =>{
          //   this.getRef('table').updateData();
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
              this.getRef('table').updateData();
            }
        });
      },
      deleteDomain(row){
        this.confirm(bbn._("Are you sure you want to delete the domain") + " " + row.domain  + " " + bbn._("?"), ()=>{
          this.post(this.root + 'actions/servers/tab_domains/delete_domain', {
              server: this.source.server,
              domain: row.domain,
            }, d => {
            if ( d.success ){
              appui.success(bbn._('Deleted') + ' ' + row.domain );
              this.getRef('table').updateData();
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
        action:()=>{
          let domains = this.getRef('table').currentData.slice();
          this.post(this.root + 'actions/servers/delete_cache',{
            server: this.source.server,
            tab:"domains",
            data_domains: domains
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
              this.getRef('table').updateData();
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
