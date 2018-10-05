<!-- <div class="bbn-full-screen">
  <bbn-dashboard v-if="domains.length">
    <bbns-widget title="<?=_("Quota")?>"
                component="appui-server-server-widget-quota"
                :source="all.total_info_server"
    ></bbns-widget>
    <bbns-widget title="<?=_("Domains:")?>"
                item-component="appui-server-server-widget-domains"
                :items="domains"
    ></bbns-widget>
    <bbns-widget title="<?=_("List Admins:")?>"
                item-component="appui-server-server-widget-admin"
                :items="admins"
                v-if="admins.length"
    ></bbns-widget>
    <bbns-widget title="<?=_("Logs:")?>"
                component="appui-server-server-widget-logs"
                :source="all"
    ></bbns-widget>
</bbn-dashboard>
</div> -->
<div class="bbn-full-screen">
  <bbn-dashboard v-if="domains.length || infos.length || admins.length">
    <bbns-widget title="<?=_("Quota")?>"
                component="appui-server-server-widget-quota"
                :source="infos"
    ></bbns-widget>
    <bbns-widget title="<?=_("Domains:")?>"
                item-component="appui-server-server-widget-domains"
                :items="domains"
    ></bbns-widget>
    <bbns-widget title="<?=_("List Admins:")?>"
                item-component="appui-server-server-widget-admin"
                :items="admins"
                v-if="admins.length"
    ></bbns-widget>
    <bbns-widget title="<?=_("Logs:")?>"
                component="appui-server-server-widget-logs"
                :source="topLevel.log"
    ></bbns-widget>
    <bbns-widget title="<?=_("Ip address")?>"
                item-component="appui-server-server-widget-ip"
                :items="topLevel.informations.ip_address"
                v-if="topLevel.informations.ip_address.length"
    ></bbns-widget>
    <bbns-widget title="<?=_("Cpu")?>"
                component="appui-server-server-widget-cpus"
                :source="infos"
                v-if="infos.cpu.length"
    ></bbns-widget>
    <bbns-widget title="<?=_("Kernel")?>"
                component="appui-server-server-widget-kernel"
                :source="infos.kernel"
                v-if="infos.kernel"
    ></bbns-widget>

    <bbns-widget title="<?=_("info_server/fcount")?>"
                 component="appui-server-server-widget-infos"
                 :source="infos.fcount"
    ></bbns-widget>


    <bbns-widget title="<?=_("info_server/host")?>"
                 component="appui-server-server-widget-infos"
                 :source="infos.host"
    ></bbns-widget>

    <!-- <bbns-widget title="<?=_("top_level/informations")?>"
                 item-component="appui-server-server-widget-infos"
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
                   {spf_dns_record: topLevel.informations.spf_dns_record},
                   {url: topLevel.informations.url},
                   {shell_type: topLevel.informations.shell_type},
                   {user_id:  topLevel.informations.user_id},
                   {webmail_redirects: topLevel.informations.webmail_redirects},
                   {user_quota: topLevel.informations.user_quota},
                   {user_quota_used: topLevel.informations.user_quota_used},
                   {sub_servers_cannot_be_under_other_domains: topLevel.informations.sub_servers_cannot_be_under_other_domains},
                   { topLevel.informations.sub_servers_inherit_ip_address}
                 ]"
></bbns-widget> -->
<bbns-widget title="<?=_("top_level/informations")?>"
             item-component="appui-server-server-widget-infos"
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
></bbns-widget>


</bbn-dashboard>
</div>
