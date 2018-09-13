(()=>{
  return {
    created(){
      //for add in menu of the tab delete cache
      bbn.vue.closest(this, "bbns-tab").addMenu({
        text: bbn._("Cache delete info"),
        icon: "far fa-trash-alt-alt",
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
    }
  }
})();
