<div class="appui-server-widget-info bbn-padded bbn-grid-fields">
  <label v-text="_('Hostname')"/>
  <div v-text="source.items.host.hostname"/>
  <label v-text="_('OS')"/>
  <div v-text="source.items.host.os"/>
  <label v-text="_('Architecture')"/>
  <div v-text="source.items.kernel.arch"/>
  <label v-text="_('Kernel')"/>
  <div v-text="source.items.kernel.version"/>
  <label v-text="_('Webmin')"/>
  <div v-text="source.items.host.webminversion"/>
  <label v-text="_('Virtualmin')"/>
  <div v-text="source.items.host.virtualminversion"/>
  <label v-text="_('Theme versions')"/>
  <div v-text="source.items.host.themeversion"/>
  <template v-for="(v, i) in source.items.progs"
            v-if="i !== 'Operating system'">
    <label v-text="i"/>
    <div v-text="v"/>
  </template>
  <label v-text="_('Running processes')"/>
  <div v-text="source.items.procs"/>
</div>