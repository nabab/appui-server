(()=>{
  return {
    data(){
      return {
        server: this.source.server,
      }
    },
    created(){
      //for add in menu of the tab delete cache
      bbn.vue.closest(this, "bbn-container").addMenu({
        text: bbn._("Delete cache"),
        icon: "nf nf-fa-trash_alt_alt",
        command:()=>{
          this.post(this.source.root + 'actions/domains/delete_cache',{
            server: this.source.server,
            domain: this.source.domain,
            tab: "commands"
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
              this.$refs.commandsDomainList.updateData();
            }
          });
        }
      });
    },
  }
})();
