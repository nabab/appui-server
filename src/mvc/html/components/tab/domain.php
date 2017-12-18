<div class="appui-domain bbn-full-screen">
  <bbn-tabnav class="appui-domain"
              :scrollable="true"
              :autoload="true"
              ref="domainTabNav"
  >
    <bbn-tab url="information"
             :load="false"
             :static="true"
             component="appui-server-domain-information"
             icon="fa fa-info"
             :source="source"
             :title="'<?=_("Information")?>'"
    ></bbn-tab>
  </bbn-tabnav>
</div>