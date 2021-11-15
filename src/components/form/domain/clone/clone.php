<bbn-form :action="root + 'actions/domain/clone'"
          :source="source"
          ref="form"
          @success="onSuccess">
  <div class="bbn-padded bbn-w-100">
    <bbn-input v-model="source.newdomain"
               :placeholder="_('New Domain')"
               class="bbn-w-100"/>
  </div>
</bbn-form>
