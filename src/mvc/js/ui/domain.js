/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 22/11/17
 * Time: 10.38
 */

(()=>{
  return {
    created(){
      bbn.vue.setComponentRule('server/components/tab', 'appui-server');
      bbn.vue.addComponent('domain/information');
      bbn.vue.unsetComponentRule();
    },
    data(){
      return this.source
    }
  }
})();