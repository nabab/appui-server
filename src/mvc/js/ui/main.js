/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 22/11/17
 * Time: 10.38
 */

(()=>{
  return {
    created(){
      bbn.vue.setComponentRule('server/components/', 'appui');
      bbn.vue.addComponent('server');
      bbn.vue.addComponent('server/commands');
      bbn.vue.addComponent('server/info');
      bbn.vue.addComponent('server/sub_domains');
     // bbn.vue.addComponent('server/users');
      bbn.vue.unsetComponentRule();
    },
    data(){
      return this.source
    }
  }
})();