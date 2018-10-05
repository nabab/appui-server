(() => {
  return {
    data(){
      return{
        cpus:{
          cpu1: {
            labels:['used', 'free'],
            series:[parseInt(this.source.cpu[0]), 100 - parseInt(this.source.cpu[0])]
          },
          cpu2: {
            labels:['used', 'free'],
            series:[parseInt(this.source.cpu[1]), 100 - parseInt(this.source.cpu[1])]
          },
          cpu3: {
            labels:['used', 'free'],
            series:[parseInt(this.source.cpu[2]), 100 - parseInt(this.source.cpu[2])]
          },
          cpu4: {
            labels:['used', 'free'],
            series:[parseInt(this.source.cpu[3]), 100 - parseInt(this.source.cpu[3])]
          },
          cpu5: {
            labels:['used', 'free'],
            series:[parseInt(this.source.cpu[4]), 100 - parseInt(this.source.cpu[4])]
          }

        }
      }
    }
  }
})();
