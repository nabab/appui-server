<div class="appui-server-cloudmin-system bbn-overlay">
  <bbn-router :scrollable="true"
              :autoload="true"
              ref="router"
              :nav="true">
    <bbns-container url="home"
                    :static="true"
                    :load="false"
                    :source="source"
                    icon="nf nf-fa-home"
                    title="<?=_("Home")?>"
                    component="appui-server-cloudmin-system-tab-dashboard"/>
  </bbn-router>
</div>
