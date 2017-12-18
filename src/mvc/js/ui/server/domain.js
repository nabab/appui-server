/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 22/11/17
 * Time: 10.38
 */
/* jshint esversion: 6 */
(()=>{
  return {
    created(){
      bbn.vue.setComponentRule(this.root + 'server/components', 'appui');
      bbn.vue.addComponent('server/domain');
      bbn.vue.addComponent('server/domain/information');
      bbn.vue.unsetComponentRule();
    },
    data(){
      return this.source;
    }
  };
})();