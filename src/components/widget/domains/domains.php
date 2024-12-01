<div class="appui-server-widget-domains bbn-spadding">
  <bbn-tree :source="source.items"
            children="subdomains"
            source-text="name"
            source-value="name"
            :scrollable="false"
            :icons="false"
            :component="$options.components.domain"/>
</div>
