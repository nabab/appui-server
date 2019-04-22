<div class="bbn-full-screen">
  <bbn-dashboard>
    <bbns-widget :title="titleWidget.general"
                 component="appui-server-widget-infos"
                 :source="general"
                 ref="general"
    ></bbns-widget>
    <bbns-widget :title="titleWidget.users"
                 component="appui-server-widget-users"
                 :source="source.users"
                 ref="users"
                 v-if="source.users.length"
    ></bbns-widget>
  </bbn-dashboard>
</div>
