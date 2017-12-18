/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 27/02/17
 * Time: 10.25
 */
/* jshint esversion: 6 */
(()=>{
  let ui;
  return {
    mixins: [bbn.vue.localStorageComponent],
    data(){
      return{
        cfg: {},
        root: this.source.root
      };
    },
    created(){
      ui = this;
      let mixins = [{
        data(){
          return ui.$data;
        },
        methods: {
          getUI(){
            return ui;
          }
        }
      }];
      bbn.vue.setComponentRule(this.source.root + 'components', 'appui-server');
      bbn.vue.addComponent('main', mixins);
      bbn.vue.addComponent('widget/servers', mixins);
      bbn.vue.addComponent('widget/domain', mixins);
      bbn.vue.unsetComponentRule();
    },
  };
})();

