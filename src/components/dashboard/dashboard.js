(() => {
  return {
    props: {
      source: {
        type: Object
      }
    },
    data(){
      return {
        root: appui.plugins['appui-server'] + '/'
      }
    },
    computed: {
      widgetData(){
        return {
          server: this.source.server
        };
      }
    }
  }
})();
