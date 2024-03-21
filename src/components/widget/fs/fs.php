<div class="appui-server-widget-fs bbn-padded">
  <bbn-chart type="radial"
             :source="chartData"
             :legend="chartData.labels"
             v-if="chartData"
             height="350px"
             :cfg="chartCfg"
             ref="chart"
             :legend-render="legendRender"
             :labels="false"
             @ready="details = true"/>
  <div v-if="!!chartData && chartData.values && !!details"
       v-for="(v, i) in chartData.values"
       :class="['bbn-grid-fields', 'bbn-bordered', 'bbn-spadded', {
         'bbn-bottom-xsspace': !!chartData.values[i+1]
       }]"
       :style="{
         borderColor: !!$refs.chart ? $refs.chart.color[i] + '!important' : ''
       }">
    <label><?= _('Mount point') ?></label>
    <div v-text="v.mount"/>
    <label><?= _('Device') ?></label>
    <div v-text="v.device"/>
    <label><?= _('Filesystem') ?></label>
    <div v-text="v.fs"/>
    <label><?= _('Used space') ?></label>
    <div v-text="v.size"/>
  </div>
</div>
