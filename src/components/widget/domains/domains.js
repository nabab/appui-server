/**
 * Created by BBN Solutions.
 * User: Vito Fava
 * Date: 23/11/17
 * Time: 16.23
 */
(() => {
  return {
    methods: {
      forceRefresh(){
        let widget = this.closest('bbn-widget');
        widget.data.force = true;
        widget.$once('loaded', () => {
          delete widget.data.force;
        });
        widget.reload();
      }
    },
    components: {
      domain: {
        template: `
<div class="bbn-left-sspace bbn-flex-fill bbn-flex-width bbn-vmiddle">
  <div class="bbn-flex-fill bbn-vmiddle">
    <a :href="root + '/ui/server/' +  source.server + '/domain/' + source.name"
      v-text="source.name"/>
    <span v-if="!!source.subdomains && source.subdomains.length"
          v-text="'(' + source.subdomains.length + ')'"
          class="bbn-left-sspace"/>
  </div>
  <div v-if="!!source.rapport_quota"
       class="bbn-vmiddle">
      <span class="bbn-right-sspace"
            v-text="source.rapport_quota"/>
      <i class="nf nf-fa-database"/>
      <i v-if="source.alert_quota"
        class="nf nf-fa-exclamation_triangle bbn-red"/>
  </div>
</div>
        `,
        props: {
          source: {
            type: Object,
            required: true
          }
        },
        data(){
          return {
            root: appui.plugins['appui-server'] + '/'
          }
        }
      }
    }
  };
})();
