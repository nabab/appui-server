/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.11
 */
(()=>{
 return {
   created(){
     //for add in menu of the tab delete cache
     bbn.vue.closest(this, "bbns-tab").addMenu({
       text: bbn._("Delete cache"),
       icon: "far fa-trash-alt-alt",
       command:()=>{
         bbn.fn.post(this.source.root + 'actions/domains/delete_cache',{
           server: this.source.server,
           domain: thiss.source.domain,
           tab: "informations"
         }, d => {
           if ( d.success ){
             appui.success(bbn._("Delete"));
             this.$refs.infoDomainTable.updateData();
           }
         });
       }
     });
   }
 }
})();
