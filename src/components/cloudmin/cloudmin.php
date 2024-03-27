<div class="appui-server-cloudmin bbn-overlay">
  <bbn-router :scrollable="true"
              :autoload="true"
              ref="router"
              :nav="true">
    <bbns-container url="systems"
                    :fixed="true"
                    :load="false"
                    :source="source.systems"
                    icon="nf nf-fa-laptop"
                    bcolor="#fdcd04"
                    title="<?= _("Systems") ?>"
                    component="appui-server-cloudmin-tab-systems"/>
    <bbns-container url="commands"
                    :load="false"
                    :fixed="true"
                    component="appui-server-cloudmin-tab-commands"
                    icon="nf nf-fa-cogs"
                    :source="source"
                    title="<?= _("Commands") ?>"/>
  </bbn-router>
</div>
