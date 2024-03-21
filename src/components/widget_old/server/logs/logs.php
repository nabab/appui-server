<!-- <div>
  <template v-for="item in source">
    <div style="border-style: solid; border-width: 0px 0px 1px 0px;">
      <div class="bbn-w-100 bbn-c">
        <span class="bbn-xl bbn-b" v-text="item.domain"></span>
      </div>
      <div class="bbn-padded  bbn-grid-fields">
        <label class="bbn-b"><?= _("Access:") ?></label>
        <span class="domains admin" v-text="item.access_log"></span>
        <label class="bbn-b"><?= _("Error:") ?></label>
        <span class="domains admin" v-text="item.error_log"></span>
      </div>
    </div>
  </template>
</div> -->


<div>
      <div class="bbn-padded  bbn-grid-fields">
        <label class="bbn-b"><?= _("Access:") ?></label>
        <span class="domains admin" v-text="source.access_log"></span>
        <label class="bbn-b"><?= _("Error:") ?></label>
        <span class="domains admin" v-text="source.error_log"></span>
      </div>
    </div>

</div>
