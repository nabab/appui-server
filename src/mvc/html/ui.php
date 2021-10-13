<div class="appui-server bbn-overlay">
  <bbn-router :scrollable="true"
              :autoload="true"
              :nav="true">
    <bbns-container url="home"
                    :static="true"
                    :load="true"
                    icon="nf nf-fa-home"
                    bcolor="tomato"
                    fcolor="white"
                    title="<?=_("Dashboard")?>"
                    :notext="true"/>
    <bbns-container url="cloudmin"
                    :static="true"
                    :load="true"
                    bcolor="dodgerblue"
                    fcolor="white"
                    icon="nf nf-fae-cloud"
                    title="<?=_("Cloudmin")?>"
                    :notext="true"/>
  </bbn-router>
</div>