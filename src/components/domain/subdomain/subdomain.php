<div class="appui-server-domain-subdomain bbn-overlay">
  <bbn-router :scrollable="true"
              :autoload="true"
              ref="router"
              :nav="true">
    <bbns-container url="info"
                    :load="false"
                    :fixed="true"
                    component="appui-server-domain-subdomain-info"
                    icon="nf nf-fa-info"
                    bcolor="cornflowerblue"
                    fcolor="white"
                    :source="source"
                    label="<?= _("info") ?>"
                    :notext="true"/>
    <bbns-container url="command"
                    :load="false"
                    :fixed="true"
                    component="appui-server-domain-subdomain-commands"
                    icon="nf nf-md-function"
                    bcolor="darkorange"
                    fcolor="white"
                    :source="source"
                    label="<?= _("Commands") ?>"
                    :notext="true"/>
  </bbn-router>
</div>