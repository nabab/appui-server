<div>
  <template v-for="(backup, i) in source">
    <span class="bbn-b bbn-xl" v-text="'Name :' + backup.name"></span>
    <div class="bbn-w-100 bbn-grid-fields">
      <template v-for="(value, ele) in backup['values']">
        <span class="bbn-b bbn-xl" v-text="ele + ':'"></span>
        <span class="bbn-xl bbn-l" v-text="value[0]" style="padding-left:10px"></span>
      </template>
    </div>
  </template>
</div>
