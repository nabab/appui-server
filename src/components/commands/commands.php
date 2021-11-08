<div class="appui-server-commands">
  <bbn-table :sortable="true"
             :groupable="true"
             :server-grouping="false"
             :group-by="1"
             ref="table"
             :source="root + 'data/server/commands'"
             :data="{
               server: source.server
             }">
    <bbns-column title="<?=_("Command")?>"
                 field="command"
                 class="bbn-l"/>
    <bbns-column title="<?=_("Category")?>"
                 field="category"/>
    <bbns-column title="<?=_("Description")?>"
                 field="description"/>
  </bbn-table>
</div>
