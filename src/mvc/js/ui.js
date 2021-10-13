/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 27/02/17
 * Time: 10.25
 */
/* jshint esversion: 6 */
(() => {
  return {
    mixins: [bbn.vue.localStorageComponent],
    data(){
      return{
        cfg: {},
        root: this.source.root
      };
    }  
  };
})();
