(() => {
  return {
    props: {
      source: {
        type: Object
      }
    },
    data(){
      return {
        all: [],
        domains: [],
        admins: [],
      }
    },
    created(){
      //for add in menu of the tab delete cache
      bbn.vue.closest(this, "bbn-container").addMenu({
        text: bbn._("Cache delete dashboard"),
        icon: "nf nf-fa-trash_alt_alt",
        command:()=>{
          bbn.fn.post(this.source.root + 'actions/delete_cache',{
            server: this.source.server
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
            }
          });
        }
      });
    //   bbn.vue.setComponentRule(this.source.root + 'components/server', 'appui-server');
    //   bbn.vue.addComponent('widget/domains');
    //   bbn.vue.addComponent('widget/admin');
    //   bbn.vue.addComponent('widget/logs');
    //   bbn.vue.unsetComponentRule();
     },
    // mounted(){
    //   //for dasboard
    //   bbn.fn.post(this.source.root + 'data/server/home',{
    //     server: this.source.server
    //   }, d => {
    //     if ( d.success ){
    //       this.all = d.all;
    //       this.domains = d.domains;
    //       this.admins = d.list_admins;
    //     }
    //   });
    // }
  }
})();
