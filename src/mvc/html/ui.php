<div class="appui-server bbn-full-screen">
  <bbn-tabnav class="appui_server"
              :scrollable="true"
              :autoload="true"
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
  </bbn-tabnav>
</div>
