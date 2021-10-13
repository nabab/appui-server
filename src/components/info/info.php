<div class="appui-server-info">
  <bbn-table :order="[{parts: 'DESC'}]"
             :sortable="true"
             ref="infoServerTable"
             :source="root + 'data/server/informations/' + source.server">
    <bbns-column title="<?=_("Information")?>"
                 field="info"/>
    <bbns-column title="<?=_("Value")?>"
                 field="value"/>
  </bbn-table>
</div>
