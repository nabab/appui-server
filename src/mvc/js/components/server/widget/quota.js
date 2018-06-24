(() => {
  return {
    data(){
      return{
        disk_info:{
          labels:['occupated', 'free'],
          series:[this.source.disk_occupated, this.source.disk_free]
        }
      }
    }
  }
})();
