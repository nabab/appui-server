<div class="appui-server bbn-overlay">
  <bbn-router class="appui_server"
              :scrollable="true"
              :autoload="true"
              :nav="true"
  >
     <bbns-container url="home"
             :static="true"
             :load="true"
             :title="'<i class=\'nf nf-fa-home\'> </i>&nbsp;<?=_("Dashboard")?>'"
    ></bbns-container>
    <bbns-container url="cloudmin"
              :static="true"
              :load="true"
              bcolor="#4cf0ce"
              :title="'<i class=\'nf nf-fa-cogs\'> </i>&nbsp;<?=_("Cloudmin")?>'"
    ></bbns-container>
  </bbn-router>
</div>