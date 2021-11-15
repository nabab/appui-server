<div class="appui-server-widget-updates bbn-block">
  <bbn-table :source="source.items"
             :scrollable="false"
             :pageable="true"
             :titles="false"
             :limits="[]"
             :limit="10"
             :footer-buttons="false">
    <bbns-column field="desc"
                 width="100%"
                 :render="render"/>
  </bbn-table>
</div>