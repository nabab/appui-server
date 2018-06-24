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
    },
    data(){
      return this.source;
    }
  };
})();
