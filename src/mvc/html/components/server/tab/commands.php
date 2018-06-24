<div class="appui-server-tab-commands">
  <bbn-table :order="[{parts: 'DESC'}]"
             :sortable="true"
             :groupable="true"
             :server-grouping="false"
             :group-by="1"
             ref="tableCommandServer"
             :source="source.root + 'data/server/commands/' + source.server"
  >
    <bbns-column title="<?=_("Commands:")?>"
                field="command"
                class="bbn-l"
    ></bbns-column>
    <bbns-column title="<?=_("Category commands:")?>"
                field="category"
    ></bbns-column>
    <bbns-column title="<?=_("Description:")?>"
                field="description"
    ></bbns-column>

  </bbn-table>
</div>
