<div class="appui-server-commands">
  <bbn-table :order="[{parts: 'DESC'}]"
             :sortable="true"
             :groupable="true"
             :server-grouping="false"
             :group-by="1"
             ref="tableCommandServer"
             :source="root + 'data/server/commands/' + source.server">
    <bbns-column title="<?=_("Commands:")?>"
                 field="command"
                 class="bbn-l"/>
    <bbns-column title="<?=_("Category commands:")?>"
                 field="category"/>
    <bbns-column title="<?=_("Description:")?>"
                 field="description"/>
  </bbn-table>
</div>
