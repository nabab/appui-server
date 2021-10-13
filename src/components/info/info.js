/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.11
 */
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
            tab: "informations"
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
              this.$refs.infoServerTable.updateData();
            }
          });
        }
      })
    }
  };
})();
