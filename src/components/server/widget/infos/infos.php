<div class="bbn-w-100 bbn-grid-fields">
  <template v-for="(value, ele) in source">
    <span class="bbn-b bbn-xl" v-text="ele + ':'"></span>
    <span class="bbn-xl bbn-l" v-text="value" style="padding-left:10px"></span>
  </template>
</div>
