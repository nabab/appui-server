<div class="appui-server bbn-overlay">
  <bbn-router :scrollable="true"
              :autoload="true"
              :nav="true"
              :master="true">
    <bbns-container url="home"
                    :static="true"
                    :load="true"
                    icon="nf nf-fa-home"
                    bcolor="tomato"
                    fcolor="white"
                    title="<?=_("Dashboard")?>"
                    :notext="true"/>
  </bbn-router>
</div>