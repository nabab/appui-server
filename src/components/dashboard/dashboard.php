<div class="bbn-overlay">
  <bbn-dashboard :order="!!source.widgets ? source.widgets.order : []">
    <bbns-widget v-if="!!source.widgets && source.widgets.list.info"
                 :label="source.widgets.list.info.text"
                 v-bind="source.widgets.list.info"
                 :data="widgetData"
                 :uid="source.widgets.list.info.key"/>
    <bbns-widget v-if="!!source.widgets && source.widgets.list.cpu"
                 :label="source.widgets.list.cpu.text"
                 v-bind="source.widgets.list.cpu"
                 :data="widgetData"
                 :uid="source.widgets.list.cpu.key"/>
    <bbns-widget v-if="!!source.widgets && source.widgets.list.memory"
                 :label="source.widgets.list.memory.text"
                 v-bind="source.widgets.list.memory"
                 :data="widgetData"
                 :uid="source.widgets.list.memory.key"/>
    <bbns-widget v-if="!!source.widgets && source.widgets.list.fs"
                 :label="source.widgets.list.fs.text"
                 v-bind="source.widgets.list.fs"
                 :data="widgetData"
                 :uid="source.widgets.list.fs.key"/>
    <bbns-widget v-if="!!source.widgets && source.widgets.list.domains"
                 :label="source.widgets.list.domains.text"
                 v-bind="source.widgets.list.domains"
                 :data="widgetData"
                 :uid="source.widgets.list.domains.key"/>
    <bbns-widget v-if="!!source.widgets && source.widgets.list.services"
                 :label="source.widgets.list.services.text"
                 v-bind="source.widgets.list.services"
                 :data="widgetData"
                 :uid="source.widgets.list.services.key"/>
    <bbns-widget v-if="!!source.widgets && source.widgets.list.updates"
                 :label="source.widgets.list.updates.text"
                 v-bind="source.widgets.list.updates"
                 :data="widgetData"
                 :uid="source.widgets.list.updates.key"/>
    
    <!-- <bbns-widget label="<?= _("List Admins") ?>"
                item-component="appui-server-widget-server-admin"
                :items="admins"
                v-if="admins.length"/>
    <bbns-widget label="<?= _("Logs") ?>"
                component="appui-server-widget-server-logs"
                :source="topLevel.log"
                v-if="topLevel.length"/>
    <bbns-widget label="<?= _("IP address") ?>"
                item-component="appui-server-widget-server-ip"
                :items="topLevel.informations.ip_address"
                v-if="topLevel.length"/>
    
    
    <bbns-widget label="<?= _("Kernel") ?>"
                component="appui-server-widget-server-kernel"
                :source="infos.kernel"
                v-if="infos.kernel"/>
    <bbns-widget label="<?= _("info_server/fcount") ?>"
                 component="appui-server-widget-server-infos"
                 :source="infos.fcount"
                 v-if="infos.fcount.length"/>
    <bbns-widget label="<?= _("info_server/host") ?>"
                 component="appui-server-widget-server-infos"
                 :source="infos.host"
                 v-if="infos.host.length"/>
    <bbns-widget label="<?= _("top_level/informations") ?>"
                 item-component="appui-server-widget-server-infos"
                 :items="[
                   {created_by: topLevel.informations.created_by},
                   {created_on: topLevel.informations.created_on},
                   {html_directory:topLevel.informations.html_directory},
                   {login_permissions: topLevel.informations.login_permissions},
                   {php_execution_mode: topLevel.informations.php_execution_mode},
                   {php_fcgid_subprocesses: topLevel.informations.php_fcgid_subprocesses},
                   {php_execution_mode: topLevel.informations.php_execution_mode},
                   {php_version: topLevel.informations.php_version},
                   {server_block_quota_used: topLevel.informations.server_block_quota_used},
                 ]"
                 v-if="topLevel.length"/> -->
  </bbn-dashboard>
</div>
