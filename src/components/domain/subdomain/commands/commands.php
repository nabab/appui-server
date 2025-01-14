<div class="component-sub_domin-commands">
  <bbn-table :order="[{parts: 'DESC'}]"
             :sortable="true"
             :groupable="true"
             :server-grouping="false"
             :group-by="1"
             :source="source.root + 'data/subdomain/commands/'+ source.server + '/' + source.domain + '/' + source.sub_domain"
  >
    <bbns-column label="<?= _("Commands:") ?>"
                field="command"
                class="bbn-l"
    ></bbns-column>
    <bbns-column label="<?= _("Category commands:") ?>"
                field="category"
    ></bbns-column>
    <bbns-column label="<?= _("Description:") ?>"
                field="description"
    ></bbns-column>

  </bbn-table>
</div>
