<div class="bbn-overlay">
  <bbn-dashboard>
    <bbns-widget :label="titleWidget.status"
                 component="appui-server-widget-infos"
                 :source="status"
                 ref="status"
    ></bbns-widget>

    <bbns-widget :label="titleWidget.general"
                 component="appui-server-widget-infos"
                 :source="general"
                 ref="general"
    ></bbns-widget>
    <bbns-widget :label="titleWidget.domains"
                 v-if="source.list_domains.length"
                 ref="domains"
                 :source="domains"
                 component="appui-server-widget-domains"
    ></bbns-widget>
    <bbns-widget :label="titleWidget.diskQuota"
                 component="appui-server-widget-quota"
                 ref="disk"
                 :source="disk"
    ></bbns-widget>
    <bbns-widget :label="titleWidget.realMemory"
                 component="appui-server-widget-quota"
                 ref="ram"
                 :source="ram"
    ></bbns-widget>
    <bbns-widget :label="titleWidget.cpus"
                 v-if="source.cpu_load.length"
                 ref="cpus"
                 component="appui-server-widget-cpus"
                 :source="cpus"
    ></bbns-widget>
    <bbns-widget :label="titleWidget.backups"
                 v-if="source.list_backup_logs.length"
                 ref="backup_logs"
                 :source="source.list_backup_logs"
                 component="appui-server-widget-backups"
    ></bbns-widget>
  </bbn-dashboard>
</div>
