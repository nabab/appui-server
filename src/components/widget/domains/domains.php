<div class="appui-server-widget-domains">
  <bbn-tree :source="[source]"
            children="subdomains"
            source-text="name"
            source-value="name"
            :scrollable="false"
            :icons="false"
            :component="$options.components.domain"/>
</div>
