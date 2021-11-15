<div class="appui-server-widget-services bbn-padded">
  <div class="bbn-grid-fields bbn-r">
    <template v-for="(item, i) in source.items">
      <div v-text="item.name"/>
      <div class="bbn-grid" style="grid-template-columns: 1fr 1fr 1fr">
        <template v-if="!!parseInt(item.status)">
          <i class="nf nf-fa-check bbn-green bbn-xl bbn-c"
             :title="_('Running')"/>
          <i class="nf nf-fa-stop_circle bbn-red bbn-left-sspace bbn-p bbn-xl bbn-c"
             :title="_('Stop')"
             @click="stop(item)"/>
          <i class="nf nf-fa-repeat bbn-blue bbn-left-sspace bbn-p bbn-xl bbn-c"
             :title="_('Restart')"
             @click="restart(item)"/>
        </template>
        <template v-else>
          <i class="nf nf-oct-stop bbn-red bbn-xl bbn-c"
             :title="_('Stopped')"/>
          <i class="nf nf-fa-play bbn-green bbn-left-sspace bbn-p bbn-xl bbn-c"
             :title="_('Start')"
             @click="start(item)"/>
        </template>
      </div>
    </template>
  </div>
</div>