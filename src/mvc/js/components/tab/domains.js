/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.11
 */
(() => {
  return {
    methods:{
      renderDomain(row){
        return '<a href="' + this.root + 'ui/server/' + this.server + '/domain/' + row.domain + '"><span>' + row.domain + '</span></a>';
      },
      listUser(){
        alert("sasa");
        bbn.fn.log("sssss", d, a );
      }
    },
  };
})();