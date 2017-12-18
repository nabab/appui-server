Vue.component('appui-server-domain-commands', {
  name: 'appui-server-domain-commands',
  template: '#bbn-tpl-component-appui-server-domain-commands',
  props: ['source'],
  data(){
    return {
      server: this.source.server,

    }
  },
  methods:{},
  mounted(){
    bbn.fn.warning('Commands');
    bbn.fn.log(this.source)
  },
});
