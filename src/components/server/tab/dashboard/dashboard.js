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
      bbn.vue.closest(this, "bbns-tab").addMenu({
        text: bbn._("Delete cache"),
        icon: "far fa-trash-alt-alt",
        command:()=>{
          bbn.fn.post(this.source.root + 'actions/servers/delete_cache',{
            server: this.source.server,
            tab:"dashboard",
            data_domains: this.domains
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
            }
          });
        }
      });
    },
    mounted(){
      //for dasboard
      bbn.fn.post(this.source.root + 'data/server/home',{
        server: this.source.server
      }, d => {
        if ( d.success ){
          this.all = d.all;
          this.domains = d.domains;
          this.admins = d.list_admins;
        }
      });
    }
  }
})();
