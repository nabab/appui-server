// Javascript Document
/* jshint esversion: 6 */
(() => {
  return {
    data(){
      return {
        mainCp: false
      }
    },
    computed: {
      tasksQueue(){
        if (this.mainCp && this.mainCp.tasksQueue && this.source.server) {
          return bbn.fn.filter(this.mainCp.tasksQueue, {server: this.source.server});
        }
        return [];
      },
      runningTasks(){
        if (this.mainCp && this.mainCp.runningTasks && this.source.server) {
          return bbn.fn.filter(this.mainCp.runningTasks, {server: this.source.server});
        }
        return [];
      }
    },
    methods: {
      fdate(val){
        return !!val ? dayjs(val).format('DD/MM/YYYY HH:mm:ss') : '';
      },
      getUser(id){
        return appui.app.getUserName(id);
      },
      getArgs(args){
        args = JSON.parse(args);
        return bbn.fn.isArray(args) ? args.map(a => bbn.fn.isObject(a) || bbn.fn.isArray(a) ? JSON.stringify(a) : a).join(', ') : args;
      }
    },
    mounted(){
      this.mainCp = appui.getRegistered('appui-server');
    }
  };
})();
