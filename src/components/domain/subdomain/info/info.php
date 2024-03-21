<div class="appui-domain-information">
  <div class="appui-server-tab-info">
    <bbn-table :order="[{parts: 'DESC'}]"
               :sortable="true"
               :source="source.root + 'data/subdomain/informations/' + source.server + '/' + source.domain + '/' + source.sub_domain"
    >
      <bbns-column title="<?= _("Information") ?>"
                  field="info"
      ></bbns-column>

      <bbns-column title="<?= _("Value") ?>"
                  field="value"
      ></bbns-column>

    </bbn-table>

  </div>

</div>
