<div class="appui-domain bbn-full-screen">
  <bbn-tabnav class="appui-domain"
              :scrollable="true"
              :autoload="true"
              ref="domainTabNav"
  >
    <bbns-tab url="home"
             :static="true"
             :load="false"
             :source="source"
             icon="fa fa-home"
             bcolor="#8EA28F"
             :title="'<?=_("Home")?>'"
             component="appui-server-server-domain-tab-dashboard"
    ></bbns-tab>
    <bbns-tab url="subdomains"
             :load="false"
             :static="true"
             component="appui-server-server-domain-tab-sub_domains"
             icon="fa fa-align-justify"
             :source="source"
             :title="'<?=_("Sub_domains")?>'"
    ></bbns-tab>
    <bbns-tab url="users"
             :load="false"
             :static="true"
             component="appui-server-server-domain-tab-users"
             icon="fa fa-users"
             :source="source"
             :title="'<?=_("Users")?>'"
    ></bbns-tab>
    <bbns-tab url="information"
             :load="false"
             :static="true"
             component="appui-server-server-domain-tab-information"
             icon="fa fa-info"
             :source="source"
             :title="'<?=_("Information")?>'"
    ></bbns-tab>
    <bbns-tab url="commands"
             :load="false"
             :static="true"
             component="appui-server-server-domain-tab-commands"
             icon="fa fa-cogs"
             :source="source"
             :title="'<?=_("Commands")?>'"
    ></bbns-tab>
  </bbn-tabnav>
</div>
