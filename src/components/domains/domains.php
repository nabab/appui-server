<bbn-table :source="root + 'data/server/domains'"
           :data="{
             server: source.server
           }"
           :sortable="true"
           :server-sorting="false"
           ref="table"
           :order="[{field: 'name', dir: 'ASC'}]"
           :editable="true"
           editor="appui-server-form-domain-edit">
  <bbns-column label="<?= _("Name") ?>"
               field="name"
               cls="bbn-c"
               :width="300"
               :render="renderDomain"/>
  <bbns-column label="<?= _("Parent") ?>"
               field="parent"
               cls="bbn-c"
               :width="300"
               :render="renderParent"/>
  <bbns-column label="<?= _("Created") ?>"
               cls="bbn-c"
               :width="250"
               field="created"/>
  <bbns-column label="<?= _("User") ?>"
               field="users"
               :render="renderUsers"/>
  <bbns-column :tcomponent="$options.components.newDomain"
               :width="170"
               cls="bbn-c"
               :buttons="buttons"
               :options="{server: source.server}"/>
</bbn-table>
