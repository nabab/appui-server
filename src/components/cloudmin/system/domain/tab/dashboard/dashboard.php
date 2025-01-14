<div class="bbn-overlay">
  <bbn-dashboard>
    <bbns-widget :label="titleWidget.general"
                 component="appui-server-widget-infos"
                 :source="general"
                 ref="general"
    ></bbns-widget>
    <bbns-widget :label="titleWidget.users"
                 component="appui-server-widget-users"
                 :source="source.users"
                 ref="users"
                 v-if="source.users.length"
    ></bbns-widget>
  </bbn-dashboard>
</div>
