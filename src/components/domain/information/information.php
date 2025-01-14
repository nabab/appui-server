<div class="appui-domain-information">
  <div class="appui-server-tab-info">
    <bbn-table :order="[{parts: 'DESC'}]"
               :sortable="true"
               ref="infoDomainTable"
               :source="source.root + 'data/domain/informations/' + source.server + '/' + source.domain"
    >
      <bbns-column label="<?= _("Information") ?>"
                  field="info"
      ></bbns-column>

      <bbns-column label="<?= _("Value") ?>"
                  field="value"
      ></bbns-column>

    </bbn-table>

  </div>

</div>
