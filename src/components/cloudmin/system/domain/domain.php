<div class="appui-domain bbn-overlay">
  <bbn-router class="appui-cloudmin-system"
               :scrollable="true"
               :autoload="true"
               ref="domainTabNav"
               :nav="true"
  >
    <bbns-container url="home"
                    :fixed="true"
                    :load="false"
                    :source="source"
                    icon="nf nf-fa-home"
                    :label="'<?= _("Home") ?>'"
                    component="appui-server-cloudmin-system-domain-tab-dashboard"
    ></bbns-container>
  </bbn-router>
</div>
