<bbn-form class="appui-server-form-domain-rename"
          :action="root + 'actions/domain/rename'"
          :source="source"
          ref="form"
          @success="onSuccess"
          :validation="onValidation">
  <div class="bbn-padded bbn-w-100">
    <bbn-input v-model="source.newdomain"
               :placeholder="_('New name')"
               class="bbn-w-100"/>
  </div>
</bbn-form>