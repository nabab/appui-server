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
        users: appui.app.users
      }
    },
    methods: {
      renderDate(row, col, idx, val){
        return !!val ? dayjs(val).format('DD/MM/YYYY HH:mm:ss') : '';
      },
      renderFailed(row){
        return !!row.failed ? '<i class="nf nf-fa-close bbn-red"></i>' : '';
      },
      renderServer(row){
        return !!row.server ? `<a href="${this.root}ui/server/${row.server}">${row.server}</a>` : '';
      },
      renderArgs(row){
        let args = JSON.parse(row.args);
        return bbn.fn.isArray(args) ? args.map(a => bbn.fn.isObject(a) || bbn.fn.isArray(a) ? JSON.stringify(a) : a).join(', ') : args;
      },
      trCls(row){
        return !!row.active && !!row.start && !row.end && !row.failed ? 'bbn-primary' : '';
      },
      getButtons(row){
        return !!row.active && !row.start && !row.failed ? [{
          text: bbn._('Remove'),
          action: this.remove,
          icon: 'nf nf-fa-trash',
          notext: true
        }] : [];
      },
      remove(row){
        if (!!row.server && !!row.id) {
          this.confirm(bbn._('Are you sure you want to remove this task?'), () => {
            this.post(this.root + 'actions/server/tasks/remove', {
              id: row.id,
              server: row.server
            }, d => {
              if (d.success) {
                this.getRef('table').updateData();
                appui.success();
              }
              else {
                appui.error();
              }
            });
          });
        }
      }
    }
  };
})();