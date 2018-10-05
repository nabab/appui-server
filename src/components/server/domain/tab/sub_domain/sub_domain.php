<div class="appui-sub-domain bbn-full-screen">
  <bbn-tabnav class="appui-sub-domain"
              :scrollable="true"
              :autoload="true"
              ref="subDomainTabNav"
  >
    <bbns-tab url="info"
             :load="false"
             :static="true"
             component="appui-server-sub_domain-tab-info"
             icon="fas fa-info"
             :source="source"
             :title="'<?=_("info")?>'"
    ></bbns-tab>
    <bbns-tab url="command"
             :load="false"
             :static="true"
             component="appui-server-sub_domain-tab-commands"
             icon="fas fa-cogs"
             :source="source"
             :title="'<?=_("Commands")?>'"
    ></bbns-tab>

  </bbn-tabnav>
</div>
