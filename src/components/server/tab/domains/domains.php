<bbn-table :source="source.root + 'data/server/domains/' + source.server"
           :sortable="true"
           ref="domainsListTable"
           :order="[{field: 'domain', dir: 'DESC'}]"
           :editable="true"
           editor="appui-server-popup-server-domain-edit"
>
  <bbns-column title="<?=_("Active")?>"
              cls="bbn-c"
              :width= "50"
              :buttons="stateButtonDomain"
              field="disabled"
  ></bbns-column>
  <bbns-column title="<?=_("Domain")?>"
              field="domain"
              cls="bbn-c"
              :width="300"
              :render="renderDomain"
  ></bbns-column>
  <bbns-column title="<?=_("Created")?>"
              cls="bbn-c"
              :width="250"
              field="created"
  ></bbns-column>
  <bbns-column title="<?=_("User")?>"
              field="users"
  ></bbns-column>
  <bbns-column :tcomponent="$options.components.newDomain"
              :width="150"
              cls="bbn-c"
              :buttons="[{
                text: '<?=_("Edit Domain")?>',
                command: editDomain,
                notext: true,
                icon: 'fas fa-edit'
              },{
                text: '<?=_("Clone Domain")?>',
                command: cloneDomain,
                notext: true,
                icon: 'fas fa-copy'
              },{
                text: '<?=_("Delete Domain")?>',
                command: deleteDomain,
                icon: 'fas fa-trash',
                notext: true
              }]"
  ></bbns-column>
</bbn-table>
