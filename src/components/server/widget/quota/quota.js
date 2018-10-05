// (() => {
//   var obj = {};
//   return {
//     data(){
//       return{
//         disk_occupated: obj.disk_occupated,
//         disk_free: obj.disk_free,
//         disk_info:{
//           labels:['occupated', 'free'],
//           series:[this.source.disk_occupated, this.source.disk_free]
//         }
//       }
//     }
//   }
// })();


(() => {

  return {

    data(){
      let obj = {
        disk_free: parseInt(this.source.disk_free),
        disk_occupated: parseInt(this.source.disk_total) - parseInt(this.source.disk_free),
        disk_total: parseInt(this.source.disk_total),
      }
      
      return{
        disk_occupated: obj.disk_occupated,
        disk_free: obj.disk_free,
        disk_total: obj.disk_total,
        disk_info:{
          labels:['occupated', 'free'],
          series:[obj.disk_occupated, obj.disk_free]
        }
      }
    }
  }
})();
