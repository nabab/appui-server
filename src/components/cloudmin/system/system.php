<div class="appui-domain bbn-overlay">
  <bbn-router class="appui-cloudmin-system"
               :scrollable="true"
               :autoload="true"
               ref="systemTabNav"
               :nav="true"
  >
    <bbns-container url="home"
                    :static="true"
                    :load="false"
                    :source="source"
                    icon="nf nf-fa-home"
                    :title="'<?=_("Home")?>'"
                    component="appui-server-cloudmin-system-tab-dashboard"
    ></bbns-container>
  </bbn-router>
</div>
