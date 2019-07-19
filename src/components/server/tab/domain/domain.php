<div class="appui-domain bbn-overlay">
  <bbn-tabnav class="appui-domain"
              :scrollable="true"
              :autoload="true"
              ref="domainTabNav"
  >
    <bbns-container url="home"
             :static="true"
             :load="false"
             :source="source"
             icon="nf nf-fa-home"
             bcolor="#8EA28F"
             :title="'<?=_("Home")?>'"
             component="appui-server-server-domain-tab-dashboard"
    ></bbns-container>
    <bbns-container url="subdomains"
             :load="false"
             :static="true"
             component="appui-server-server-domain-tab-sub_domains"
             icon="nf nf-fa-align_justify"
             :source="source"
             :title="'<?=_("Sub_domains")?>'"
    ></bbns-container>
    <bbns-container url="users"
             :load="false"
             :static="true"
             component="appui-server-server-domain-tab-users"
             icon="nf nf-fa-users"
             :source="source"
             :title="'<?=_("Users")?>'"
    ></bbns-container>
    <bbns-container url="information"
             :load="false"
             :static="true"
             component="appui-server-server-domain-tab-information"
             icon="nf nf-fa-info"
             :source="source"
             :title="'<?=_("Information")?>'"
    ></bbns-container>
    <bbns-container url="commands"
             :load="false"
             :static="true"
             component="appui-server-server-domain-tab-commands"
             icon="nf nf-fa-cogs"
             :source="source"
             :title="'<?=_("Commands")?>'"
    ></bbns-container>
  </bbn-tabnav>
</div>
