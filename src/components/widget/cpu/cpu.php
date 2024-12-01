<div class="appui-server-widget-cpu bbn-padding">
  <bbn-chart type="radial"
             :source="chartData"
             :legend="chartData.labels"
             height="350px"
             v-if="chartData"
             :cfg="chartCfg"
             ref="chart"
             :legend-render="legendRender"
             :labels="false"/>
</div>
