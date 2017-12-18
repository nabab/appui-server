/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 11.15
 */
Vue.component('appui-server-users', {
  name: 'appui-server-users',
  template: '#bbn-tpl-component-appui-server-users',
  props: ['source'],
  data(){
    return {
      nameUsers: [],
      server: this.source.server
    }
  },
  methods:{},
  mounted(){
    bbn.fn.warning('component user');
    bbn.fn.log(this.source)
    let obj ={
      server: this.source.server
    }
    bbn.fn.post(this.source.root +'tabs/users', obj,  (d)=>{
      if ( d.success ){
        for( let user of d.users ){
          this.nameUsers.push(user.name);
        }
      }
        bbn.fn.log("users", d);
        alert("guarda");

    });
  },
});