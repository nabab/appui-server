
<div class="bbn-flex-width bbn-v-middle">
  <div class="bbn-flex-fill">
    <a :href="'server/ui/server/' +  source.name + '/domain/' + source.name">
      <span class="bbn-xl domains"
            v-text="source.name"
      >
      </span>
    </a>
  </div>
  <!--quota-->
  <div class="bbn-xl">
      <span style="padding-right: 5px;" v-text="source.rapport_quota"></span>
      <i class="fa fa-database"></i>
      <i v-if="source.alert_quota" class="fa fa-exclamation-triangle bbn-red"></i>
  </div>
</div>
