<div class="appui-server bbn-full-screen">
  <bbn-tabnav class="appui_server"
              :scrollable="true"
              :autoload="true"
  >
    <bbn-tab url="home"
             :static="true"
             :load="true"
             :title="'<i class=\'fa fa-home\'> </i>&nbsp;<?=_("Dashboard")?>'"
    ></bbn-tab>
  </bbn-tabnav>
</div>
<!--<script v-for="temp in source.templates" :id="temp.id" type="text/x-template" v-html="temp.html"></script>-->
