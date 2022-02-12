(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/'
      }
    },
    methods: {
      forceRefresh(){
        let widget = this.closest('bbn-widget');
        widget.data.force = true;
        widget.$once('loaded', () => {
          delete widget.data.force;
        });
        widget.reload();
      },
      getServiceName(item){
        switch (item.feature) {
          case 'web':
            return 'apache2';
          case 'fpm':
            return 'php' + item.id.substring(0, 3) + '-fpm';
          case 'dns':
            return 'bind9';
          case 'mail': 
            return 'postfix';
          case 'dovecot':
            return 'dovecot';
          case 'ftp':
            return 'proftpd';
          case 'sshd':
            return 'ssh';
          default:
            return '';
        }
      },
      postAction(data){
        let dash = this.closest('appui-server-dashboard');
        if (dash.source.server) {
          data.server = dash.source.server;
          this.post(this.root + 'actions/server/service', data, d => {
            if (d.success) {
              appui.success(bbn._('The action was added to the queue'));
            }
            else {
              appui.error(bbn._('Unable to add action to queue or already present'));
            }
          });
        }
      },
      start(item){
        this.postAction({
          action: 'start',
          service: this.getServiceName(item)
        });
      },
      stop(item){
        this.postAction({
          action: 'stop',
          service: this.getServiceName(item)
        });
      },
      restart(item){
        this.postAction({
          action: 'restart',
          service: this.getServiceName(item)
        });
      }
    }
  }
})();