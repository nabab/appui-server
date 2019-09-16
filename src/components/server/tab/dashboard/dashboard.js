(() => {
  return {
    props: {
      source: {
        type: Object
      }
    },
    data(){
      return {
        domains: [],
        topLevel: [],
        admins: [],
        infos: [],
        show: false
      }
    },
    // created(){
    //   //for add in menu of the tab delete cache
    //   bbn.vue.closest(this, "bbn-container").addMenu({
    //     text: bbn._("Delete cache"),
    //     icon: "nf nf-fa-trash_alt_alt",
    //     command:()=>{
    //       this.post(this.source.root + 'actions/servers/delete_cache',{
    //         server: this.source.server,
    //         tab:"dashboard",
    //         data_domains: this.domains
    //       }, d => {
    //         if ( d.success ){
    //           appui.success(bbn._("Delete"));
    //         }
    //       });
    //     }
    //   });
    // },
    created(){
      //for dasboard
      this.post(this.source.root + 'data/server/home',{
        server: this.source.server
      }, d => {
        if ( d.success ){
          this.domains = d.list_domains;
          this.topLevel = d.top_level;
          this.admins = d.top_level.list_admins === undefined ? [] : d.top_level.list_admins;
          this.infos = d.info_server;
          this.show= d.success
        }
      });
    }
  }
})();
