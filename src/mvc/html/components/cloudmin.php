<div class="appui-server-cloudmin bbn-full-screen">
  <bbn-tabnav class="appui-cloudmin"
              :scrollable="true"
              :autoload="false"
              ref="cloudminTabNav"
  >
    <bbns-tab url="hosts"
             :load="false"
             :static="true"
             component="appui-server-cloudmin-tab-hosts"
             icon="fa fa-server"
             :source="source"
             :title="'<?=_("Hosts")?>'"
    ></bbns-tab>
    <bbns-tab url="commands"
             :load="false"
             :static="true"
             component="appui-server-cloudmin-tab-commands"
             icon="fa fa-cogs"
             :source="source"
             :title="'<?=_("Commands")?>'"
    ></bbns-tab>
    <bbns-tab url="information"
             :load="false"
             :static="true"
             component="appui-server-cloudmin-tab-informations"
             icon="fa fa-info"
             :source="source"
             :title="'<?=_("Information")?>'"
    ></bbns-tab>
  </bbn-tabnav>
</div>
