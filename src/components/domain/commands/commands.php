<div class="component-server-commands">
  <bbn-table :order="[{parts: 'DESC'}]"
             :sortable="true"
             :groupable="true"
             :server-grouping="false"
             :group-by="1"
             ref="commandsDomainList"
             :source="source.root + 'data/domain/commands/' + source.server + '/' + source.domain"
  >
    <bbns-column title="<?= _("Commands:") ?>"
                field="command"
                class="bbn-l"
    ></bbns-column>
    <bbns-column title="<?= _("Category commands:") ?>"
                field="category"
    ></bbns-column>
    <bbns-column title="<?= _("Description:") ?>"
                field="description"
    ></bbns-column>

  </bbn-table>
</div>
