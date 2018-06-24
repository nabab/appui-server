(()=>{
  return {
    created(){
      bbn.fn.post("server/data/cloudmin/informations",{ele: 'cloudmin.lan'},()=>{
        alert();
      });
    }
  }
})();
