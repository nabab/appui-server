/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 13.39
 */
/* jshint esversion: 6*/
(() => {
  return {
    props: {
      source: {
        type: Object
      },
      server: {
        type: String
      }
    },
    created(){
      //for add menu in tab of the host
      bbn.vue.closest(this, "bbns-tab").addMenu({
        text: bbn._("Delete cache"),
        icon: "far fa-trash-alt-alt",
        command:()=>{
          bbn.fn.post(this.source.root +'actions/servers/delete_cache',{
            toplevel: true,
            server: this.source.server
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
            }
          });
        }
      })
    }
  };
})();