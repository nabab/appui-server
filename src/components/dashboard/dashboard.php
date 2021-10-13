<div class="bbn-overlay">
  <bbn-dashboard v-if="ready">
    <bbns-widget title="<?=_("Quota")?>"
                component="appui-server-widget-server-quota"
                :source="infos"
                v-if="infos !== undefined"/>
    <bbns-widget title="<?=_("Domains")?>"
                item-component="appui-server-widget-server-domains"
                :items="domains"
                v-if="domains.length"/>
    <bbns-widget title="<?=_("List Admins")?>"
                item-component="appui-server-widget-server-admin"
                :items="admins"
                v-if="admins.length"/>
    <bbns-widget title="<?=_("Logs")?>"
                component="appui-server-widget-server-logs"
                :source="topLevel.log"
                v-if="topLevel.length"/>
    <bbns-widget title="<?=_("IP address")?>"
                item-component="appui-server-widget-server-ip"
                :items="topLevel.informations.ip_address"
                v-if="topLevel.length"/>
    <bbns-widget title="<?=_("CPU")?>"
                component="appui-server-widget-server-cpus"
                :source="infos"
                v-if="infos.cpu.length"/>
    <bbns-widget title="<?=_("Kernel")?>"
                component="appui-server-widget-server-kernel"
                :source="infos.kernel"
                v-if="infos.kernel"/>
    <bbns-widget title="<?=_("info_server/fcount")?>"
                 component="appui-server-widget-server-infos"
                 :source="infos.fcount"
                 v-if="infos.fcount.length"/>
    <bbns-widget title="<?=_("info_server/host")?>"
                 component="appui-server-widget-server-infos"
                 :source="infos.host"
                 v-if="infos.host.length"/>
    <bbns-widget title="<?=_("top_level/informations")?>"
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
                 v-if="topLevel.length"/>
  </bbn-dashboard>
  <div v-else class="bbn-100 bbn-middle">
    <span class="bbn-xxxl bbn-b"><?=_("Loading...")?></span>
  </div>
</div>
