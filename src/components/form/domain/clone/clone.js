(() => {
  return {
    data(){
      return {
        root : appui.plugins['appui-server'] + '/'
      };
    },
    methods: {
      onSuccess(d){
        if (d.success) {
          appui.success();
          this.closest('bbn-container').find('appui-server-domains').getRef('table').updateData();
        }
      }
    }
  };
})();
