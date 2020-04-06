<div class="appui-server-main bbn-overlay">
  <bbn-router class="appui-server"
              :autoload="true"
              :scrollable="true"
              ref="serverTabNav"
              :nav="true"
  >
    <bbns-container url="home"
             :static="true"
             :load="false"
             :source="source"
             icon="nf nf-fa-home"
             bcolor="#8EA28F"
             :title="'<?=_("Home")?>'"
             component="appui-server-server-tab-dashboard"
    ></bbns-container>
    <bbns-container url="domains"
             :load="false"
             :static="true"
             component="appui-server-server-tab-domains"
             icon="nf nf-fa-align_justify"
             :source="source"
             :title="'<?=_("Domains")?>'"
    ></bbns-container>
    <bbns-container url="commands"
             :load="false"
             :static="true"
             component="appui-server-server-tab-commands"
             icon="nf nf-fa-cogs"
             :source="source"
             :title="'<?=_("Commands")?>'"
    ></bbns-container>
    <bbns-container url="info"
             :load="false"
             :static="true"
             component="appui-server-server-tab-info"
             icon="nf nf-fa-info"
             :source="source"
             :title="'<?=_("Information")?>'"
    ></bbns-container>
  </bbn-router>
</div>
