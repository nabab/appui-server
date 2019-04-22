<div class="appui-sub-domain bbn-full-screen">
  <bbn-tabnav class="appui-sub-domain"
              :scrollable="true"
              :autoload="true"
              ref="subDomainTabNav"
  >
    <bbns-container url="info"
             :load="false"
             :static="true"
             component="appui-server-sub_domain-tab-info"
             icon="nf nf-fa-info"
             :source="source"
             :title="'<?=_("info")?>'"
    ></bbns-container>
    <bbns-container url="command"
             :load="false"
             :static="true"
             component="appui-server-sub_domain-tab-commands"
             icon="nf nf-fa-cogs"
             :source="source"
             :title="'<?=_("Commands")?>'"
    ></bbns-container>

  </bbn-tabnav>
</div>
