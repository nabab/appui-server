<div class="appui-server-domain-subdomain bbn-overlay">
  <bbn-router :scrollable="true"
              :autoload="true"
              ref="router"
              :nav="true">
    <bbns-container url="info"
                    :load="false"
                    :static="true"
                    component="appui-server-domain-subdomain-info"
                    icon="nf nf-fa-info"
                    bcolor="cornflowerblue"
                    fcolor="white"
                    :source="source"
                    title="<?= _("info") ?>"
                    :notext="true"/>
    <bbns-container url="command"
                    :load="false"
                    :static="true"
                    component="appui-server-domain-subdomain-commands"
                    icon="nf nf-mdi-function"
                    bcolor="darkorange"
                    fcolor="white"
                    :source="source"
                    title="<?= _("Commands") ?>"
                    :notext="true"/>
  </bbn-router>
</div>