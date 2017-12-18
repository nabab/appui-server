<div class="bbn-full-screen">
  <bbn-dashboard>
    <bbn-widget title="<?=_("Servers:")?>"
                item-component="appui-server-widget-servers"
                :items="source.data"
    ></bbn-widget>
  </bbn-dashboard>
</div>