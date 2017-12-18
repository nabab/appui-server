/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 21/11/17
 * Time: 18.11
 */


Vue.component('appui-server-domain-information', {
  name: 'appui-server-domain-information',
  template: '#bbn-tpl-component-appui-server-domain-information',
  props: ['source'],
  data(){
    return { }
  },
  methods:{},
  mounted(){
    bbn.fn.warning(' domain Info');
    bbn.fn.log(this.source)
  },
});
