<div class="component-server-commands">
  <bbn-table :order="[{parts: 'DESC'}]"
             :sortable="true"
             :groupable="true"
             :server-grouping="false"
             :group-by="1"
             :source="source.root + 'tabs/commands/' + domain"
  >
    <bbn-column title="<?=_("Commands:")?>"
                field="command"
                class="bbn-l"
    ></bbn-column>
    <bbn-column title="<?=_("Category commands:")?>"
                field="category"
    ></bbn-column>
    <bbn-column title="<?=_("Description:")?>"
                field="description"
    ></bbn-column>

  </bbn-table>
</div>