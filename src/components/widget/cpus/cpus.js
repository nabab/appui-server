(() => {
  return {
    props: {
      source: {
        type: Object
      }
    },
    data(){
      return{
        cpus:[]
      }
    },
    mounted(){
      let arr = [];
      bbn.fn.each(this.source.list, (val, i) =>{
        arr.push({
          labels:['used', 'free'],
          series:[val, (100 - val)]
        })
      });
      this.cpus= arr;
    }
  }
})();
