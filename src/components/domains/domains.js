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
      buttons(row){
        let buttons = [];
        if (!!row.disabled) {
          buttons.push({
            text: bbn._('Enable'),
            class:'bbn-bg-green bbn-white',
            action: this.enableDomain,
            notext: true,
            icon: 'nf nf-fa-play',
          });
        }
        else {
          buttons.push({
            text: bbn._('Disable'),
            action: this.disableDomain,
            notext: true,
            class:"bbn-bg-red bbn-white",
            icon: 'nf nf-fa-power_off',
          });
        }
        buttons.push({
          text: bbn._('Edit'),
          action: this.editDomain,
          notext: true,
          icon: 'nf nf-fa-edit'
        },{
          text: bbn._('Clone'),
          action: this.cloneDomain,
          notext: true,
          icon: 'nf nf-fa-clone'
        },{
          text: bbn._('Delete'),
          action: this.deleteDomain,
          icon: 'nf nf-fa-trash',
          notext: true
        });
        return buttons;
      },
      disableDomain(row){
        this.confirm(bbn._('Are you sure you want to disable the domain %s?', row.name), () => {
          this.post(this.root + 'actions/domain/state', {
            server: this.source.server,
            state: 'disabled',
            domain: row.name
          }, d => {
            if (d.success) {
              appui.success();
              this.getRef('table').updateData();
            }
          });
        });
      },
      enableDomain(row){
        this.confirm(bbn._('Are you sure you want to enable the domain %s?', row.name), ()=>{
          this.post(this.root + 'actions/domain/state', {
            server: this.source.server,
            state: 'enabled',
            domain: row.name
          }, d => {
            if (d.success) {
              appui.success();
              this.getRef('table').updateData();
            }
          });
        });
      },
      editDomain(row, col, idx){
        return this.getRef('table').edit(row, {
          title: bbn._('Edit %s', row.name),
          height: '70%',
          width: '50%',
          // onClose: () =>{
          //   this.getRef('table').updateData();
          // }
        }, idx);
      },
      cloneDomain(row){
        this.getPopup().open({
            title: bbn._('Clone %s', row.name),
            component: 'appui-server-form-domain-clone',
            minWidth: 400,
            source:{
              server: this.source.server,
              domain: row.name,
              newdomain: ''
            }
        });
      },
      deleteDomain(row){
        this.confirm(bbn._('Are you sure you want to delete the domain %s?', row.name), () => {
          this.post(this.root + 'actions/domain/delete', {
              server: this.source.server,
              domain: row.domain,
            }, d => {
            if ( d.success ){
              appui.success();
              this.getRef('table').updateData();
            }
            else {
              appui.error();
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
