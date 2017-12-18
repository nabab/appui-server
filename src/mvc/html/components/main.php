<div class="appui-server-main bbn-full-screen">
  <bbn-tabnav class="appui-server"
              :autoload="true"
              :scrollable="true"
              ref="serverTabNav"
  >
    <bbn-tab url="domains"
             :load="false"
             :static="true"
             component="appui-server-tab-domains"
             icon="fa fa-info"
             :source="source"
             :title="'<?=_("Domains")?>'"
    ></bbn-tab>
    <bbn-tab url="commands"
             :load="false"
             :static="true"
             component="appui-server-tab-commands"
             icon="fa fa-code"
             :source="source"
             :title="'<?=_("Commands")?>'"
    ></bbn-tab>
    <bbn-tab url="info"
             :load="false"
             :static="true"
             component="appui-server-tab-info"
             icon="fa fa-info"
             :source="source"
             :title="'<?=_("Information")?>'"
    ></bbn-tab>
  </bbn-tabnav>
</div>