(()=>{
  return {
    created(){
      //for add in menu of the tab delete cache
      this.closest("bbn-container").addMenu({
        text: bbn._("Cache delete info"),
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
    }
  }
})();
