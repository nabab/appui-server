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
      this.closest("bbn-container").addMenu({
        text: bbn._("Cache delete dashboard"),
        icon: "nf nf-fa-trash_alt_alt",
        action:()=>{
          this.post(this.source.root + 'actions/delete_cache',{
            server: this.source.server
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
            }
          });
        }
      });
    //   bbn.cp.setComponentRule(this.source.root + 'components/server', 'appui-server');
    //   bbn.cp.addComponent('widget/domains');
    //   bbn.cp.addComponent('widget/admin');
    //   bbn.cp.addComponent('widget/logs');
    //   bbn.cp.unsetComponentRule();
     },
    // mounted(){
    //   //for dasboard
    //   this.post(this.source.root + 'data/server/home',{
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
