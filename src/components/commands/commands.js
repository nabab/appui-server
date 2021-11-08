(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/'
      }
    },
    created(){
      //for add in menu of the tab delete cache
      bbn.vue.closest(this, "bbn-container").addMenu({
        text: bbn._("Delete cache"),
        icon: "nf nf-fa-trash_alt_alt",
        action(){
          this.post(this.root + 'actions/servers/delete_cache',{
            server: this.source.server,
            tab:"commands"
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
              this.getRef('table').updateData();
            }
          });
        }
      });
    }
  };
})();
