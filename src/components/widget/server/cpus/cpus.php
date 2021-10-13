<div class="bbn-padded">
  <template v-for="(cpu, i) in cpus">
    <div>
      <label class="bbn-b" v-text="i"></label>
      <bbn-chart type="pie"
                 :source="cpu"
                 :color="['yellow', 'green']"
                 height="150px"                 
                 :donut="true"
                 :label-external="false"
                 :label-offset="60"
                 :padding="40"
                 :label-wrap="false"
                 :show-label="false"
      ></bbn-chart>
    </div>
  </template>
</div>
