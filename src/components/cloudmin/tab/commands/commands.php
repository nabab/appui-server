<div class="appui-server-cloudmin-tab-commands">
  <bbn-table :order="[{field: 'command', dir: 'ASC'}]"
             v-if="commands.length"  
             :sortable="true"
             ref="table"
             :source="sourceTable"
             :toolbar="$options.components.search"
             :expander="$options.components.cmd"
  >
    <bbns-column label="<?= _("Commands:") ?>"
                field="command"
                cls="bbn-b"

    ></bbns-column>
    <bbns-column label="<?= _("Description:") ?>"
                field="description"
                :render="renderDescription"
    ></bbns-column>
  </bbn-table>
</div>
