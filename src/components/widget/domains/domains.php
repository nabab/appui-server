<bbn-table :order="[{field: 'name', Dir: 'ASC'}]"
           :sortable="false"
           :scrollable="false"
           ref="table"
           :source="source.list"
           :pageble="true"
           v-if="isMounted"
>
  <bbns-column title="<?=_("Name")?>"
              field="name"
              :render="nameDomain"
              cls="bbn-b"
  ></bbns-column>
  <bbns-column title="<?=_("Created")?>"
               :render="renderCreated"
               cls="bbn-c"
  ></bbns-column>
</bbn-table>
