<div>
  <div class="appui-server-tab-sub_domains">
    <bbn-table :sortable="false"
               :scrollable="false"
               ref="table"
               :source="source"
               :pageble="true"
               :order="[{field: 'name', dir: 'DESC'}]"
               v-if="ready === true"
    >
      <bbns-column label="<?= _("Active") ?>"
                  cls="bbn-c"
                  :render="renderDisabled"
      ></bbns-column>
      <bbns-column label="<?= _("User") ?>"
                  cls="bbn-c"
                  field="name"
      ></bbns-column>
      <bbns-column label="<?= _("Quota") ?>"
                  cls="bbn-c"
                  :render="renderQuota"
      ></bbns-column>
    </bbn-table>
  </div>
</div>
