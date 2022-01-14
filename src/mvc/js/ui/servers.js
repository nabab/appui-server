(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/'
      }
    },
    methods: {
      renderName(row){
        return !!row.code ? `<a href="${this.root}/ui/server/${row.code}">${row.name}</a>` : row.name;
      },
      renderCloudmin(row){
        return !!row.cloudmin ? '<i class="nf nf-fa-check bbn-green"></i>' : '';
      },
      renderUptime(row){
        if (row.uptime) {
          let dur = dayjs.duration(row.uptime * 1000),
              years = dur.format('Y'),
              months = dur.format('M'),
              days = dur.format('D'),
              hours = dur.format('H'),
              minutes = dur.format('m'),
              seconds = dur.format('s'),
              ret = seconds + 's';
          if (minutes > 0) {
            ret = minutes + 'm ' + ret;
          }
          if (hours > 0) {
            ret = hours + 'H ' + ret;
          }
          if (days > 0) {
            ret = days + 'D ' + ret;
          }
          if (months > 0) {
            ret = months + 'M ' + ret;
          }
          if (years > 0) {
            ret = years + 'Y ' + ret;
          }
          return ret;
        }
      },
      open(row){
        if (row.code) {
          bbn.fn.link(this.root + 'ui/server/' + row.code);
        }
      },
      openExt(row){
        if (row.code) {
          bbn.fn.link('https://' + row.code + ':10000');
        }
      },
      add(){
        this.getPopup().open({
          title: bbn._('Add server'),
          component: 'appui-server-form-server-edit',
          source: {
            id: '',
            name: '',
            code: '',
            user: '',
            pass1: '',
            pass2: '',
            cloudmin: 0
          }
        });
      },
      edit(row){
        if (row.id) {
          this.post(this.root + 'data/server/password', {id: row.id}, d => {
            if (d.success) {
              this.getPopup().open({
                title: bbn._('Edit server'),
                component: 'appui-server-form-server-edit',
                source: {
                  id: row.id,
                  name: row.name,
                  code: row.code,
                  user: row.user,
                  pass1: d.pass,
                  pass2: d.pass,
                  cloudmin: row.cloudmin
                }
              });
            }
          });
        }
      },
      remove(row){
        if (row.id) {
          this.confirm(bbn._('Are you sure you want to delete this server?'), () => {
            this.post(this.root + 'actions/server/remove', {id: row.id}, d => {
              if (d.success) {
                this.getRef('table').updateData();
                appui.success();
              }
              else {
                appui.error();
              }
            })
          });
        }
      },
      reloadCache(row){
        if (row.id) {
          this.confirm(bbn._('Are you sure you want to reload the cache of this server?'), () => {
            this.post(this.root + 'actions/server/cache', {id: row.id}, d => {
              if (d.success) {
                appui.success(bbn._('The action was added to the queue'));
              }
              else {
                appui.error(bbn._('Unable to add action to queue or already present'));
              }
            })
          });
        }
      }
    }
  }
})();