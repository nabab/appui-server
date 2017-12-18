<div class="appui-domain-information">
  <div class="appui-server-tab-info">
    <bbn-table :order="[{parts: 'DESC'}]"
               :sortable="true"
               :source="source.root + 'data/domain/informations/' + source.server + '/' + source.domain"
    >
      <bbn-column title="<?=_("Information")?>"
                  field="info"
      ></bbn-column>

      <bbn-column title="<?=_("Value")?>"
                  field="value"
      ></bbn-column>

    </bbn-table>

  </div>

</div>