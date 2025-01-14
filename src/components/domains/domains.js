/**
 * Created by Mirko Argentino
 * Date: 08/11/21
 */
(() => {
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
          text: bbn._('Rename'),
          action: this.renameDomain,
          notext: true,
          icon: 'nf nf-mdi-format_title'
        }, {
          text: bbn._('Edit'),
          action: this.editDomain,
          notext: true,
          icon: 'nf nf-fa-edit'
        }, {
          text: bbn._('Clone'),
          action: this.cloneDomain,
          notext: true,
          icon: 'nf nf-fa-clone'
        }, {
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
              appui.success(bbn._('The action was added to the queue'));
            }
            else {
              appui.error(bbn._('Unable to add action to queue or already present'));
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
              appui.success(bbn._('The action was added to the queue'));
            }
            else {
              appui.error(bbn._('Unable to add action to queue or already present'));
            }
          });
        });
      },
      editDomain(row, col, idx){
        bbn.fn.log('edit', row);
        return this.getRef('table').edit(row, {
          label: bbn._('Edit %s', row.name)
        }, idx);
      },
      cloneDomain(row){
        this.getPopup({
            label: bbn._('Clone %s', row.name),
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
              domain: row.name,
            }, d => {
              if (d.success) {
                appui.success(bbn._('The action was added to the queue'));
              }
              else {
                appui.error(bbn._('Unable to add action to queue or already present'));
              }
          });
        });
      },
      renameDomain(row){
        this.getPopup({
          label: bbn._('Rename %s', row.name),
          component: 'appui-server-form-domain-rename',
          minWidth: 400,
          source:{
            server: this.source.server,
            domain: row.name,
            newdomain: row.name
          }
        });
      }
    },
    created(){
      //for add in menu of the tab delete cache
      this.closest("bbn-container").addMenu({
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
        template: `
<bbn-button title="` + bbn._('New domain') + `"
            @click="addDomain"
            icon="nf nf-fa-plus"
            :notext="true"/>
        `,
        props: {
          source: {
            type: Object,
            required: true
          }
        },
        methods:{
          addDomain(){
            this.getPopup({
              label: bbn._("Add new domain"),
              component: 'appui-server-form-domain-add',
              source: {
                server: this.source.options.server,
                type: 'top',
                parent: '',
                name: '',
                description: '',
                password: '',
                features: {}
              }
            });
          }
        }
      }
    }
  };
})();
