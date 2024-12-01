<div class="appui-server-widget-memory bbn-padding">
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