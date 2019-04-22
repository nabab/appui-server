(() => {
  return {
    data(){
      return{
        ready: false
      }
    },
    methods:{
      renderDisabled(row){
        if( row.values.disabled === "Yes"){
          return  '<div class="bbn-c"><i style="color: red" class="nf nf-fa-user_times"></i></div>'
        }
        else{
            return  '<div class="bbn-c"><i style="color: green" class="nf nf-fa-user"></i></div>'
        }
      },
      renderQuota(row){
        if ( row.values['home_quota'][0] === "Unlimited" ) {
          return row.values.home_quota[0];
        }
        else if( bbn.fn.isNumber(row.values.home_byte_quota_used) &&
          bbn.fn.isNumber(row.values.home_byte_quota)
        ){
          let bar= (100*row.values.home_byte_quota_used)/row.values.home_byte_quota,
              color = "green";
          bar = bar > 100 ? 100 : bar;
          if ( (bar > 70) && (bar < 91) ){
            color = "orange";
          }
          if ((bar >= 91) && (bar <= 100)){
            color = "red";
          }
          return `<div class="bbn-w-100 bbn-flex-width">
                    <div class="bbn-w-30">${Math.round(bar)}%</div>
                    <div class="bbn-flex-fill" style="height: 80%; border: 1px solid">
                      <div style="height: 12px; width:`+ bar +`% ; background-color:` + color +`"></div>
                    </div>
                  </div>`
        }
      }
    },
    mounted() {
      this.$nextTick(() => {
        this.ready = true;
      });    
    }

  }
})();
