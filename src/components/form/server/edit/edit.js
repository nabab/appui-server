(() => {
  return {
    props: {
      source: {
        type: Object
      }
    },
    data(){
      return {
        root: appui.plugins['appui-server'] + '/',
        pass1type: 'password',
        pass2type: 'password'
      }
    },
    methods: {
      validation(d){
        if (d.pass1 !== d.pass2) {
          this.alert(bbn._("The passwords don't match"));
          return false;
        }
        return true;
      },
      onSuccess(d){
        if (d.success) {
          this.closest('bbn-container').getComponent().getRef('table').updateData();
          appui.success();
        }
        else {
          appui.error();
        }
      }
    }
  }
})();