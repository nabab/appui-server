<div class="ui appui-server-tab-sub_domains">
  <bbn-table :order="[{parts: 'DESC'}]"
             :sortable="true"
             class="bbn-100"
             ref="listSubDomainsTable"
             :source="source.root + 'data/domain/sub_domains/' + source.server + '/' + source.domain"
  >
    <bbns-column title="<?=_("Active")?>"
                cls="bbn-c"
                :width= "50"
                :buttons="stateButtonSubDomain"
                field="disabled"
    ></bbns-column>
    <bbns-column title="<?=_("Sub-domains")?>"
                cls="bbn-c"
                field="sub_domains"
                :render="renderSubDomain"
    ></bbns-column>
    <bbns-column title="<?=_("Created")?>"
                cls="bbn-c"
                field="created"
    ></bbns-column>
    <bbns-column :tcomponent="$options.components.newSubDomain"
                :width="150"
                cls="bbn-c"
                :buttons="[{
                  text: '<?=_("Edit Sub-domain")?>',
                  command: editSubDomain,
                  notext: true,
                  icon: 'fas fa-edit'
                },{
                  text: '<?=_("Clone Sub-domain")?>',
                  command: cloneSubDomain,
                  notext: true,
                  icon: 'fas fa-copy'
                },{
                  text: '<?=_("Delete Sub-domain")?>',
                  command: deleteSubDomain,
                  icon: 'fas fa-trash',
                  notext: true
                }]"
    ></bbns-column>
  </bbn-table>
</div>
