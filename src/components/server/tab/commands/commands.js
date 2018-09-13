(() => {
  return {
    created(){
      //for add in menu of the tab delete cache
      bbn.vue.closest(this, "bbns-tab").addMenu({
        text: bbn._("Delete cache"),
        icon: "far fa-trash-alt-alt",
        command:()=>{
          bbn.fn.post(this.source.root + 'actions/servers/delete_cache',{
            server: this.source.server,
            tab:"commands"
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
              this.$refs.tableCommandServer.updateData();
            }
          });
        }
      });
    }
  };
})();
