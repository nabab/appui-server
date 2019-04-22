<div class="appui-domain bbn-full-screen">
  <bbn-tabnav class="appui-cloudmin-system"
               :scrollable="true"
               :autoload="true"
               ref="domainTabNav"
  >
    <bbns-container url="home"
                    :static="true"
                    :load="false"
                    :source="source"
                    icon="nf nf-fa-home"
                    :title="'<?=_("Home")?>'"
                    component="appui-server-cloudmin-system-domain-tab-dashboard"
    ></bbns-container>
  </bbn-tabnav>
</div>
