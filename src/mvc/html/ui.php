<div class="appui-server bbn-full-screen">
  <bbn-tabnav class="appui_server"
              :scrollable="true"
              :autoload="true"
  >
    <bbns-tab url="home"
             :static="true"
             :load="true"
             :title="'<i class=\'fas fa-home\'> </i>&nbsp;<?=_("Dashboard")?>'"
    ></bbns-tab>
  </bbn-tabnav>
</div>
<!--<script v-for="temp in source.templates" :id="temp.id" type="text/x-template" v-html="temp.html"></script>-->
