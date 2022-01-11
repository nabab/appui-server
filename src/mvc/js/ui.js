(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/',
        runningTasks: [],
        tasksQueue: []
      }
    },
    created(){
      appui.register('appui-server', this);
    },
    mounted(){
      appui.$on('appui-server', (type, data) => {
        if (data.runningTasks !== undefined) {
          let completed = this.runningTasks.filter(obj => {
            return !bbn.fn.getRow(data.runningTasks, {id: obj.id});
          });
          if (completed.length) {
            bbn.fn.each(completed, t => {
              if (!!t.server && !!t.method) {
                let server = this.findByKey('server/' + t.server, 'bbn-container');
                switch (t.method)  {
                  case 'startService':
                  case 'stopService':
                    if (bbn.fn.isVue(server)) {
                      let widget = server.find('appui-server-widget-services');
                      if (bbn.fn.isVue(widget)) {
                        widget.forceRefresh();
                      }
                    }
                    break;
                  case 'createDomain':
                  case 'cloneDomain':
                    if (bbn.fn.isVue(server)) {
                      let widget = server.find('appui-server-widget-domains');
                      if (bbn.fn.isVue(widget)) {
                        widget.forceRefresh();
                      }
                      let page = server.find('appui-server-domains'),
                          table = bbn.fn.isVue(page) ? page.getRef('table') : false;
                      if (bbn.fn.isVue(table)) {
                        table.updateData();
                      }
                    }
                    let globalContainer = this.findByKey('domains', 'bbn-container'),
                        globalPage = bbn.fn.isVue(globalContainer) ? globalContainer.getComponent() : false,
                        globalTable = bbn.fn.isVue(globalPage) ? globalPage.getRef('table') : false;
                    if (bbn.fn.isVue(globalTable)) {
                      globalTable.updateData();
                    }
                    if (t.method === 'createDomain') {
                      let args = JSON.parse(t.args);
                      bbn.fn.link(`${this.root}ui/server/${t.server}/domain/${args[0].name}`);
                    }
                    if (t.method === 'cloneDomain') {
                      let args = JSON.parse(t.args);
                      bbn.fn.link(`${this.root}ui/server/${t.server}/domain/${args[1]}`);
                    }
                    break;
                }
                if (bbn.fn.isVue(server)) {
                  let serverTasksPage = server.find('appui-server-tasks'),
                      serverTasksTable = bbn.fn.isVue(serverTasksPage) ? serverTasksPage.getRef('table') : false;
                  if (bbn.fn.isVue(serverTasksTable)) {
                    serverTasksTable.updateData();
                  }
                }
                let tasksContainer = this.findByKey('tasks', 'bbn-container'),
                    tasksPage = bbn.fn.isVue(tasksContainer) ? tasksContainer.find('appui-server-tasks') : false,
                    tasksTable = bbn.fn.isVue(tasksPage) ? tasksPage.getRef('table') : false;
                if (bbn.fn.isVue(tasksTable)) {
                  tasksTable.updateData();
                }
              }
            });
          }
          this.runningTasks.splice(0, this.runningTasks.length, ...data.runningTasks);
        }
        if (data.tasksQueue !== undefined) {
          this.tasksQueue.splice(0, this.tasksQueue.length, ...data.tasksQueue);
        }
      });
      appui.poll({
        'appui-server': {
          tasksQueueHash: false,
          runningTasksHash: false,

        }
      });
    },
    beforeDestroy(){
      appui.unregister('appui-server');
      appui.$off('appui-server');
    }
  };
})();
