(()=>{
  return {
    created(){
      //for add in menu of the tab delete cache
      bbn.vue.closest(this, "bbns-container").addMenu({
        text: bbn._("Cache delete list commands"),
        icon: "nf nf-fa-trash_alt_alt",
        command:()=>{
          this.post(this.source.root + 'actions/delete_cache',{
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
