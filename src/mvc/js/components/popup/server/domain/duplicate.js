(()=>{
  return {
    data(){
      return {
        actionPost : this.source.root + 'actions/servers/tab_domains/duplicate_domain',
        info:{
          domain:'',
          server: this.source.server
        }
      }
    },
    computed:{
      complementary(){
        if ( this.source.domain.length ){
          return {
            newdomain: this.source.domain
          }
        }
        return {}
      }
    },
    mounted(){
      this.info.domain = this.source.domain
    }

  }
})();
