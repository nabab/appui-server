(() => {
  return {
    props: {
      source: {
        type: Object
      }
    },
    data(){
      let obj = {
        disk_free: parseInt(this.source.free),
        disk_occupated: parseInt(this.source.total) - parseInt(this.source.free),
        disk_total: parseInt(this.source.total),
      }
      return{
        disk_occupated: obj.disk_occupated,
        disk_free: obj.disk_free,
        disk_total: obj.disk_total,
        disk_info:{
          labels:[(bbn._('occupated ')+ ' ' + this.source.occupated),(bbn._('free') + ' ' + this.source.free)],
          series:[obj.disk_occupated, obj.disk_free]
        }
      }
    },
  }
})();
