<div class="appui-server bbn-overlay">
  <bbn-router :scrollable="true"
              :autoload="true"
              :nav="true"
              :master="true">
    <bbns-container url="home"
                    :fixed="true"
                    :load="true"
                    icon="nf nf-fa-home"
                    bcolor="tomato"
                    fcolor="white"
                    title="<?= _("Dashboard") ?>"
                    :notext="true"/>
    <bbns-container url="servers"
                    :fixed="true"
                    :load="true"
                    icon="nf nf-oct-server"
                    bcolor="mediumseagreen"
                    fcolor="white"
                    title="<?= _("Servers") ?>"
                    :notext="true"/>
    <bbns-container url="domains"
                    :fixed="true"
                    :load="true"
                    icon="nf nf-fa-th_list"
                    bcolor="darkseagreen"
                    fcolor="white"
                    title="<?= _("Domains") ?>"
                    :notext="true"/>
    <bbns-container url="scaleway"
                    :fixed="true"
                    :load="true"
                    icon="nf nf-oct-server"
                    bcolor="purple"
                    fcolor="white"
                    title="<?= _("Scaleway") ?>"
                    :notext="true"/>
    <bbns-container url="tasks"
                    :load="false"
                    :fixed="true"
                    component="appui-server-tasks"
                    icon="nf nf-oct-tasklist"
                    bcolor="chocolate"
                    fcolor="white"
                    title="<?= _("Tasks") ?>"
                    :notext="true"/>
  </bbn-router>
</div>