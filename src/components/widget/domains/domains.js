(() => {
  return {
    props:['source'],
    data(){
      return {
        root: appui.plugins['appui-server'],
        system: this.closest('appui-server-cloudmin-system').source.system,
        isMounted: false
      }
    },
    methods:{
      nameDomain(row){
        return  '<a href="'+ this.root +'/ui/cloudmin/system/' + this.system + '/domain/'+row.name+'">' +
                   row.name +
                 '</a>';
      },
      renderCreated(row){
        if ( row.values.created_on !== undefined ){
          return row.values.created_on[0];
        }
      }
    },
    mounted() {
      this.$nextTick(() => {
        this.isMounted = true;
      });
    }
  };
})();
