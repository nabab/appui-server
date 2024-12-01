<div class="bbn-w-100 bbn-grid-fields bbn-padding">
  <template v-for="(value, ele) in source">
    <span class="bbn-b" v-text="ele + ':'"></span>
    <span class="bn-l" v-text="value" style="padding-left:10px"></span>
  </template>
</div>
