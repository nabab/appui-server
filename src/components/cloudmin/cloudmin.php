<div class="appui-server-cloudmin bbn-full-screen">
  <bbn-tabnav class="appui-cloudmin"
              :scrollable="true"
              :autoload="true"
              ref="cloudminTabNav"
  >
    <bbns-container url="systems"
             :static="true"
             :load="false"
             :source="source.systems"
             icon="nf nf-fa-laptop"
             bcolor="#fdcd04"
             :title="'<?=_("Systems")?>'"
             component="appui-server-cloudmin-tab-systems"
    ></bbns-container>
    <bbns-container url="commands"
              :load="false"
              :static="true"
              component="appui-server-cloudmin-tab-commands"
              icon="nf nf-fa-cogs"
              :source="source"
              :title="'<?=_("Commands")?>'"
    ></bbns-container>    
  </bbn-tabnav>
</div>
