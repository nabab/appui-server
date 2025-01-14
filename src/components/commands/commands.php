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
    <bbns-column label="<?= _("Command") ?>"
                 field="command"
                 class="bbn-l"/>
    <bbns-column label="<?= _("Category") ?>"
                 field="category"/>
    <bbns-column label="<?= _("Description") ?>"
                 field="description"/>
  </bbn-table>
</div>
