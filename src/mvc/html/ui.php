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
    <bbns-container url="domains"
                    :static="true"
                    :load="true"
                    icon="nf nf-fa-th_list"
                    bcolor="darkseagreen"
                    fcolor="white"
                    title="<?=_("Domains")?>"
                    :notext="true"/>
    <bbns-container url="scaleway"
                    :static="true"
                    :load="true"
                    icon="nf nf-oct-server"
                    bcolor="purple"
                    fcolor="white"
                    title="<?=_("Scaleway")?>"
                    :notext="true"/>
  </bbn-router>
</div>