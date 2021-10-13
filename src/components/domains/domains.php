<bbn-table :source="root + 'data/server/domains/' + source.server"
           :sortable="true"
           ref="domainsListTable"
           :order="[{field: 'domain', dir: 'DESC'}]"
           :editable="true"
           editor="appui-server-popup-server-domain-edit">
  <bbns-column title="<?=_("Active")?>"
               cls="bbn-c"
               :width= "50"
               :buttons="stateButtonDomain"
               field="disabled"/>
  <bbns-column title="<?=_("Domain")?>"
               field="domain"
               cls="bbn-c"
               :width="300"
               :render="renderDomain"/>
  <bbns-column title="<?=_("Created")?>"
               cls="bbn-c"
               :width="250"
               field="created"/>
  <bbns-column title="<?=_("User")?>"
               field="users"/>
  <bbns-column :tcomponent="$options.components.newDomain"
               :width="150"
               cls="bbn-c"
               :buttons="[{
                 text: '<?=_("Edit Domain")?>',
                 action: editDomain,
                 notext: true,
                 icon: 'nf nf-fa-edit'
               },{
                 text: '<?=_("Clone Domain")?>',
                 action: cloneDomain,
                 notext: true,
                 icon: 'nf nf-fa-copy'
               },{
                 text: '<?=_("Delete Domain")?>',
                 action: deleteDomain,
                 icon: 'nf nf-fa-trash',
                 notext: true
               }]"/>
</bbn-table>
