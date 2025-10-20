<div class="bbn-overlay bbn-flex-width">
  <div class="bbn-flex-height bbn-vspadding bbn-hmargin"
       style="width: 200px"
       v-if="tasksQueue.length || runningTasks.length">
    <div class="bbn-header bbn-spadding bbn-b bbn-c"><?= _('TASKS QUEUE') ?></div>
    <div class="bbn-flex-fill bbn-border-right bbn-border-left bbn-border-bottom bbn-spadding">
      <bbn-scroll>
        <div v-for="(t, i) in runningTasks"
             :class="['bbn-xspadding', 'bbn-primary', {'bbn-top-sspace': i > 0}]">
          <div class="bbn-flex-width">
            <i class="nf nf-fa-calendar bbn-right-sspace"
               title="<?= _('Created') ?>"/>
            <div class="bbn-flex-fill"
                 v-text="fdate(t.created)"/>
          </div>
          <div class="bbn-flex-width">
            <i class="nf nf-md-calendar_clock bbn-right-sspace"
               title="<?= _('Started') ?>"/>
            <div class="bbn-flex-fill"
                 v-text="fdate(t.start)"/>
          </div>
          <div class="bbn-flex-width">
            <i class="nf nf-fa-user bbn-right-sspace"
               title="<?= _('User') ?>"/>
            <div class="bbn-flex-fill"
                 v-text="getUser(t.user)"/>
          </div>
          <div class="bbn-flex-width">
            <i class="nf nf-md-function bbn-right-sspace"
               title="<?= _('Task') ?>"/>
            <div class="bbn-flex-fill"
                 v-text="t.method"/>
          </div>
          <div class="bbn-flex-width">
            <i class="nf nf-md-code_brackets bbn-right-sspace"
               title="<?= _('Arguments') ?>"/>
            <div class="bbn-flex-fill"
                 v-text="getArgs(t.args)"
                 style="word-break: break-all"/>
          </div>
        </div>
        <div v-for="(t, i) in tasksQueue"
             :class="['bbn-xspadding', {'bbn-top-sspace': (i > 0) || runningTasks.length}]">
          <div class="bbn-flex-width">
            <i class="nf nf-fa-calendar bbn-right-sspace"
               title="<?= _('Created') ?>"/>
            <div class="bbn-flex-fill"
                 v-text="fdate(t.created)"/>
          </div>
          <div class="bbn-flex-width">
            <i class="nf nf-fa-user bbn-right-sspace"
               title="<?= _('User') ?>"/>
            <div class="bbn-flex-fill"
                 v-text="getUser(t.user)"/>
          </div>
          <div class="bbn-flex-width">
            <i class="nf nf-md-function bbn-right-sspace"
               title="<?= _('Task') ?>"/>
            <div class="bbn-flex-fill"
                 v-text="t.method"/>
          </div>
          <div class="bbn-flex-width">
            <i class="nf nf-md-code_brackets bbn-right-sspace"
               title="<?= _('Arguments') ?>"/>
            <div class="bbn-flex-fill"
                 v-text="getArgs(t.args)"
                 style="word-break: break-all"/>
          </div>
        </div>
      </bbn-scroll>
    </div>
  </div>
  <div class="bbn-flex-fill">
    <bbn-router :autoload="true"
                :scrollable="true"
                ref="router"
                mode="tabs">
      <bbns-container url="home"
                      :fixed="true"
                      :load="false"
                      :source="source"
                      icon="nf nf-fa-home"
                      bcolor="teal"
                      fcolor="white"
                      label="<?= _("Home") ?>"
                      component="appui-server-dashboard"
                      :notext="true"/>
      <bbns-container url="cloudmin"
                      :load="false"
                      :fixed="true"
                      component="appui-server-cloudmin"
                      icon="nf nf-fae-cloud"
                      bcolor="dodgerblue"
                      fcolor="white"
                      :source="source"
                      label="<?= _("Cloudmin") ?>"
                      :notext="true"
                      v-if="!!source.cloudmin"/>
      <bbns-container url="domains"
                      :load="false"
                      :fixed="true"
                      component="appui-server-domains"
                      icon="nf nf-fa-th_list"
                      bcolor="sandybrown"
                      fcolor="white"
                      :source="source"
                      label="<?= _("Domains") ?>"
                      :notext="true"/>
      <bbns-container url="tasks"
                      :load="false"
                      :fixed="true"
                      component="appui-server-tasks"
                      icon="nf nf-oct-tasklist"
                      bcolor="chocolate"
                      fcolor="white"
                      :source="source"
                      label="<?= _("Tasks") ?>"
                      :notext="true"/>
      <bbns-container url="commands"
                      :load="false"
                      :fixed="true"
                      component="appui-server-commands"
                      icon="nf nf-md-function"
                      bcolor="yellowgreen"
                      fcolor="white"
                      :source="source"
                      label="<?= _("Commands") ?>"
                      :notext="true"/>
    </bbn-router>
  </div>
</div>
