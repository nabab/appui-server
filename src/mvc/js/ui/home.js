/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 12.53
 */

(() => {
  return {
    computed: {
      servers(){
        return bbn.fn.filter(this.source.servers, s => !s.cloudmin);
      },
      cloudmins(){
        return bbn.fn.filter(this.source.servers, s => !!s.cloudmin);
      }
    }
  };
})();
