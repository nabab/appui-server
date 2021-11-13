<bbn-form class="appui-server-form-domain-edit"
          :action="root + 'actions/domain/edit'"
          :source="source.row"
          :data="source.data"
          :autocomplete="false"
          @success="onSuccess"
          :validator="onValidation">
  <div class="bbn-grid-fields bbn-padded">
    <label class="bbn-label"><?=_('Description')?></label>
    <bbn-input v-model="source.row.description"
               :autocomplete="false"/>
    <template v-if="source.row.type === 'top'">
      <label class="bbn-label"><?=_('Password')?></label>
      <div class="bbn-flex-width">
        <bbn-checkbox :label="_('Leave unchanged')"
                      v-model="pswdDisabled"
                      :value="true"
                      :novalue="false"/>
        <bbn-input v-model="source.row.password"
                  :required="!pswdDisabled"
                  :type="pswdType"
                  class="bbn-flex-fill bbn-left-sspace"
                  button-right="nf nf-mdi-key_plus"
                  :button-left="pswdIcon"
                  @clickLeftButton="pswdVisible = !pswdVisible"
                  @clickRightButton="generatePswd"
                  :autocomplete="false"
                  :disabled="pswdDisabled"/>
      </div>
      <label class="bbn-label"><?=_('Total server quota')?></label>
      <div>
        <bbn-radio :source="[{
                      text: _('Unlimited'),
                      value: 'unlimited'
                    }, {
                      value: 'defined',
                      component: $options.components.quota,
                      componentOptions: {
                        type: 'server',
                        source: source.row,
                        disabled: serverQuota === 'unlimited'
                      }
                    }]"
                    v-model="serverQuota"/>
      </div>
      <label class="bbn-label"><?=_("Server administrator's quota")?></label>
      <div>
        <bbn-radio :source="[{
                      text: _('Unlimited'),
                      value: 'unlimited'
                    }, {
                      value: 'defined',
                      component: $options.components.quota,
                      componentOptions: {
                        type: 'user',
                        source: source.row,
                        disabled: userQuota === 'unlimited'
                      }
                    }]"
                    v-model="userQuota"/>
      </div>
    </template>
    <template>
      <label class="bbn-label"><?=_('Features')?></label>
      <div>
        <bbn-checkbox v-if="!!currentFeatures && currentFeatures.length"
                      v-for="(f, i) in currentFeatures"
                      v-model="source.row.features[f.value]"
                      :value="1"
                      :novalue="0"
                      :label="f.text"
                      class="bbn-w-100"
                      :key="i"/>
      </div>
    </template>
  </div>
</bbn-form>
