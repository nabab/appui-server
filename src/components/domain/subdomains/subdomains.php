<div class="appui-server-domain-subdomains">
  <bbn-table :order="[{parts: 'DESC'}]"
             :sortable="true"
             class="bbn-100"
             ref="listSubDomainsTable"
             :source="source.root + 'data/domain/subdomains/' + source.server + '/' + source.domain">
    <bbns-column title="<?=_("Active")?>"
                 cls="bbn-c"
                 :width= "50"
                 :buttons="stateButtonSubDomain"
                 field="disabled"/>
    <bbns-column title="<?=_("Sub-domains")?>"
                 cls="bbn-c"
                 field="sub_domains"
                 :render="renderSubDomain"/>
    <bbns-column title="<?=_("Created")?>"
                 cls="bbn-c"
                 field="created"/>
    <bbns-column :tcomponent="$options.components.newSubDomain"
                 :width="150"
                 cls="bbn-c"
                 fixed="right"
                 :buttons="[{
                   text: '<?=_("Edit Sub-domain")?>',
                   action: editSubDomain,
                   notext: true,
                   icon: 'nf nf-fa-edit'
                 },{
                   text: '<?=_("Clone Sub-domain")?>',
                   action: cloneSubDomain,
                   notext: true,
                   icon: 'nf nf-fa-copy'
                 },{
                   text: '<?=_("Delete Sub-domain")?>',
                   action: deleteSubDomain,
                   icon: 'nf nf-fa-trash',
                   notext: true
                 }]"/>
  </bbn-table>
</div>
