
<div class="bbn-flex-width bbn-vmiddle">
  <div class="bbn-flex-fill">
    <a :href="'server/ui/server/' +  source.name + '/domain/' + source.name">
      <span class="domains"
            v-text="source.name"
      >
      </span>
    </a>
  </div>
  <!--quota-->
  <div v-if="source.rapport_quota !== 'undefined'">
      <span style="padding-right: 5px;" v-text="source.rapport_quota"></span>
      <i class="nf nf-fa-database"></i>
      <i v-if="source.alert_quota" class="nf nf-fa-exclamation_triangle bbn-red"></i>
  </div>
</div>
