<div class="bbn-w-100 bbn-grid-fields">
  <template v-for="(value, ele) in source">
    <span class="bbn-b " v-text="ele + ':'"></span>
    <span class="bbn-l" v-text="value" style="padding-left:10px"></span>
  </template>
</div>
