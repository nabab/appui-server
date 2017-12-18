<bbn-table :order="[{parts: 'DESC'}]"
           :sortable="true"
           :source="source.root + 'data/server/domains/' + source.server"
>
  <!--<bbn-column field="url"
              :buttons="[{
                        title: '<?=_('See domain')?>',
                        icon: 'fa fa-eye',
                        }]"
              width="50"
  ></bbn-column>-->
  <bbn-column title="<?=_("Domain")?>"
              field="domain"
              :render="renderDomain"
  ></bbn-column>
  <bbn-column title="<?=_("User")?>"
              field="users"
  ></bbn-column>

</bbn-table>