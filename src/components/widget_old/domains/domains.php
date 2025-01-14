<bbn-table :order="[{field: 'name', dir: 'ASC'}]"
           :sortable="false"
           :scrollable="false"
           ref="table"
           :source="source.list"
           :pageble="true"
           v-if="isMounted"
>
  <bbns-column label="<?= _("Name") ?>"
              field="name"
              :render="nameDomain"
              cls="bbn-b"
  ></bbns-column>
  <bbns-column label="<?= _("Created") ?>"
               :render="renderCreated"
               cls="bbn-c"
  ></bbns-column>
</bbn-table>
