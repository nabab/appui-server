(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/'
      };
    },
    methods: {
      onSuccess(d){
        if (d.success) {
          appui.success(bbn._('The action was added to the queue'));
        }
        else {
          appui.error(bbn._('Unable to add action to queue or already present'));
        }
      },
      onValidation(d){
        return d.domain !== d.newdomain;
      }
    }
  };
})();
