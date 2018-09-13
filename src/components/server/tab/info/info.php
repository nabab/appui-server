<div class="appui-server-tab-info">
  <bbn-table :order="[{parts: 'DESC'}]"
             :sortable="true"
             ref="infoServerTable"
             :source="source.root + 'data/server/informations/' + source.server"
  >
    <bbns-column title="<?=_("Information")?>"
                field="info"
    ></bbns-column>

    <bbns-column title="<?=_("Value")?>"
                field="value"
    ></bbns-column>

  </bbn-table>

</div>
