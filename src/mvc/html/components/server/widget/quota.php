<div>
  <bbn-chart type="pie"
             :source="disk_info"
             :color="['red', 'green']"
             height="300px"
             :animation="true"
             :donut="false"
             :label-external="true"
             :label-offset="80"
             :padding="40"
             :label-wrap="true"
  ></bbn-chart>
</div>
