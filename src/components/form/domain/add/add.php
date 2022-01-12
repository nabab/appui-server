<bbn-form class="appui-server-form-domain-add"
          :action="root + 'actions/domain/create'"
          :source="source"
          :autocomplete="false"
          @success="onSuccess">
  <div class="bbn-grid-fields bbn-padded">
    <label class="bbn-label"><?=_('Type')?></label>
    <div>
      <bbn-radiobuttons :source="[{
                            text: _('Top-level'),
                            value: 'top',
                            icon: 'nf nf-mdi-format_vertical_align_top'
                        }, {
                            text: _('Sub-server'),
                            value: 'sub',
                            icon: 'nf nf-mdi-subdirectory_arrow_right',
                            disabled: !domains.length
                        }, {
                            text: _('Alias'),
                            value: 'alias',
                            icon: 'nf nf-oct-file_symlink_file',
                            disabled: !domains.length
                        }]"
                        v-model="source.type"
                        :required="true"/>
    </div>
    <template v-if="source.type !== 'top'">
      <label class="bbn-label"><?=_('Parent server')?></label>
      <bbn-dropdown v-model="source.parent"
                    :source="domains"
                    :required="true"/>
    </template>
    <label class="bbn-label"><?=_('Name')?></label>
    <bbn-input v-model="source.name"
              :required="true"
              :autocomplete="false"
              @change="setSuffix"/>
    <label class="bbn-label"><?=_('Description')?></label>
    <bbn-input v-model="source.description"
               :autocomplete="false"/>
    <template v-if="source.type === 'top'">
      <label class="bbn-label"><?=_('Password')?></label>
      <bbn-input v-model="source.password"
                :required="true"
                :type="pswdType"
                button-right="nf nf-mdi-key_plus"
                :button-left="pswdIcon"
                @clickLeftButton="pswdVisible = !pswdVisible"
                @clickRightButton="generatePswd"
                :autocomplete="false"/>
    </template>
    <template>
      <label class="bbn-label"><?=_('Features')?></label>
      <div v-if="featuresLoading"
           style="height: 100px"
           class="bbn-rel">
        <div class="bbn-middle bbn-overlay">
          <bbn-loadicon :size="25"/>
        </div>
      </div>
      <div v-else-if="(source.type !== 'top') && !source.parent.length"><?=_('Select a parent server to see the list of features')?></div>
      <div v-else>
        <bbn-checkbox v-if="!!currentFeatures && currentFeatures.length"
                      v-for="(f, i) in currentFeatures"
                      v-model="source.features[f.value]"
                      :value="1"
                      :novalue="0"
                      :label="f.text"
                      class="bbn-w-100"
                      :key="i"/>
      </div>
    </template>
  </div>
</bbn-form>
