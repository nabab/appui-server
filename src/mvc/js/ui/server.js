// Javascript Document
/* jshint esversion: 6 */
(() => {
  return {
    created(){
      let data = {
        root: this.root
      };
      let mixins = [{
        methods: {
          getServer(){
            return bbn.vue.closest(this, 'appui-server-main');
          }
        },
        data(){
          return $.extend(data, {server: null});
        },
        created(){
          this.server = this.getServer().server;
        }
      }];
      bbn.vue.setComponentRule(this.source.root + 'components/tab', 'appui-server-tab');
      bbn.vue.addComponent('domains', mixins);
      bbn.vue.addComponent('commands', mixins);
      bbn.vue.addComponent('info', mixins);
      bbn.vue.addComponent('domain', mixins);
      bbn.vue.addComponent('users', mixins);
      bbn.vue.unsetComponentRule();
    },
    data(){
      return this.source;
    }
  };
})();