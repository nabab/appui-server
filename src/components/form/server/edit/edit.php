<bbn-form class="appui-server-form-server-edit"
          :action="root + 'actions/server/' + (!!source.id ? 'edit' : 'add')"
          :source="source"
          :autocomplete="false"
          :validation="validation"
          @success="onSuccess">
  <div class="bbn-grid-fields bbn-spadded">
    <label class="bbn-label"><?=_('Name')?></label>
    <bbn-input v-model="source.name"
               :required="true"/>
    <label class="bbn-label"><?=_('Code')?></label>
    <bbn-input v-model="source.code"
               :required="true"/>
    <label class="bbn-label"><?=_('User')?></label>
    <bbn-input v-model="source.user"
               :required="true"/>
    <label class="bbn-label"><?=_('Password')?></label>
    <bbn-input v-model="source.pass1"
               :type="pass1type"
               :button-right="pass1type === 'password' ? 'nf nf-mdi-eye' : 'nf nf-mdi-eye_off'"
               @clickRightButton="pass1type = pass1type === 'password' ? 'text' : 'password'"
               :required="true"/>
    <label class="bbn-label"><?=_('Repeat password')?></label>
    <bbn-input v-model="source.pass2"
               :type="pass2type"
               :button-right="pass2type === 'password' ? 'nf nf-mdi-eye' : 'nf nf-mdi-eye_off'"
               @clickRightButton="pass2type = pass2type === 'password' ? 'text' : 'password'"
               :required="true"/>
    <label class="bbn-label"><?=_('Cloudmin')?></label>
    <bbn-checkbox v-model="source.cloudmin"
                  :value="1"
                  :novalue="0"/>
  </div>
</bbn-form>