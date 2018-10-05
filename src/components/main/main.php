<div class="appui-server-main bbn-full-screen">
  <bbn-tabnav class="appui-server"
              :autoload="false"
              :scrollable="true"
              ref="serverTabNav"
  >
    <bbns-tab url="home"
             :static="true"
             :load="false"
             :source="source"
             icon="fas fa-home"
             bcolor="#8EA28F"
             :title="'<?=_("Home")?>'"
             component="appui-server-server-tab-dashboard"
    ></bbns-tab>
    <bbns-tab url="domains"
             :load="false"
             :static="true"
             component="appui-server-server-tab-domains"
             icon="fas fa-align-justify"
             :source="source"
             :title="'<?=_("Domains")?>'"
    ></bbns-tab>
    <bbns-tab url="commands"
             :load="false"
             :static="true"
             component="appui-server-server-tab-commands"
             icon="fas fa-cogs"
             :source="source"
             :title="'<?=_("Commands")?>'"
    ></bbns-tab>
    <bbns-tab url="info"
             :load="false"
             :static="true"
             component="appui-server-server-tab-info"
             icon="fas fa-info"
             :source="source"
             :title="'<?=_("Information")?>'"
    ></bbns-tab>
  </bbn-tabnav>
</div>
