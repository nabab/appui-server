<div class="appui-server-main bbn-full-screen">
  <bbn-tabnav class="appui-server"
              :autoload="true"
              :scrollable="true"
              ref="serverTabNav"
  >
    <bbns-tab url="home"
             :static="true"
             :load="false"
             :source="source"
             icon="fa fa-home"
             bcolor="#8EA28F"
             :title="'<?=_("Home")?>'"
             component="appui-server-tab-dashboard"
    ></bbns-tab>
    <bbns-tab url="domains"
             :load="false"
             :static="true"
             component="appui-server-tab-domains"
             icon="fa fa-align-justify"
             :source="source"
             :title="'<?=_("Domains")?>'"             
    ></bbns-tab>
    <bbns-tab url="commands"
             :load="false"
             :static="true"
             component="appui-server-tab-commands"
             icon="fa fa-cogs"
             :source="source"
             :title="'<?=_("Commands")?>'"
    ></bbns-tab>
    <bbns-tab url="info"
             :load="false"
             :static="true"
             component="appui-server-tab-info"
             icon="fa fa-info"
             :source="source"
             :title="'<?=_("Information")?>'"
    ></bbns-tab>
  </bbn-tabnav>
</div>
