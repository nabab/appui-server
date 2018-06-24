<div class="bbn-full-screen">
  <bbn-dashboard v-if="domains.length">
    <bbns-widget title="<?=_("Quota")?>"
                component="appui-server-widget-quota"
                :source="all.total_info_server"
    ></bbns-widget>
    <bbns-widget title="<?=_("Domains:")?>"
                item-component="appui-server-widget-domains"
                :items="domains"
    ></bbns-widget>
    <bbns-widget title="<?=_("List Admins:")?>"
                item-component="appui-server-widget-admin"
                :items="admins"
                v-if="admins.length"
    ></bbns-widget>
    <bbns-widget title="<?=_("Logs:")?>"
                component="appui-server-widget-logs"
                :source="all"
    ></bbns-widget>
</bbn-dashboard>
</div>
