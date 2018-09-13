(() => {
  var obj = {};
  return {  
    data(){
      return{
        disk_occupated: obj.disk_occupated,
        disk_free: obj.disk_free,
        disk_info:{
          labels:['occupated', 'free'],
          series:[this.source.disk_occupated, this.source.disk_free]
        }
      }
    }
  }
})();
