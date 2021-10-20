<div class="appui-server-widget-fs bbn-padded">
  <bbn-chart type="radial"
             :source="chartData"
             :legend="chartData.labels"
             v-if="chartData"
             height="350px"
             :cfg="chartCfg"
             ref="chart"
             :legend-render="legendRender"
             :labels="false"/>
</div>
