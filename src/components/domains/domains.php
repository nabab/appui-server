<bbn-table :source="root + 'data/server/domains'"
           :data="{
             server: source.server
           }"
           :sortable="true"
           :server-sorting="false"
           ref="table"
           :order="[{field: 'name', dir: 'ASC'}]"
           :editable="true"
           editor="appui-server-popup-server-domain-edit">
  <bbns-column title="<?=_("Active")?>"
               cls="bbn-c"
               :width= "50"
               :buttons="stateButtonDomain"
               field="disabled"/>
  <bbns-column title="<?=_("Name")?>"
               field="name"
               cls="bbn-c"
               :width="300"
               :render="renderDomain"/>
  <bbns-column title="<?=_("Parent")?>"
               field="parent"
               cls="bbn-c"
               :width="300"
               :render="renderParent"/>
  <bbns-column title="<?=_("Created")?>"
               cls="bbn-c"
               :width="250"
               field="created"/>
  <bbns-column title="<?=_("User")?>"
               field="users"
               :render="renderUsers"/>
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
