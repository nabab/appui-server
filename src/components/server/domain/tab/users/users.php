<div>
  <div class="appui-server-tab-sub_domains">
    <bbn-table :sortable="true"
               class="bbn-100"
               :source="source.root + 'data/domain/users/' + source.server + '/' + source.domain"
               ref="usersTable"
               :editable="true"
               :order="[{field: 'user', Dir: 'DESC'}]"
               editor="appui-server-popup-domains-user-edit"
    >
      <bbns-column title="<?=_("Active")?>"
                  cls="bbn-c"
                  width="40"
                  :render="renderDisabled"
                  field="disabled"
      ></bbns-column>
      <bbns-column title="<?=_("User")?>"
                  cls="bbn-c"
                  width="180"
                  field="user"
      ></bbns-column>
      <bbns-column title="<?=_("Ftp")?>"
                  width="50"
                  cls="bbn-c"
                  :render="renderFtp"
                  field="ftp_user"
      ></bbns-column>
      <bbns-column title="<?=_("Email")?>"
                  cls="bbn-c"
                  width="180"
                  type="email"
                  field="email_address"
      ></bbns-column>
      <bbns-column title="<?=_("Auto_Reply")?>"
                  width="50"
                  cls="bbn-c"
                  :render="renderReplayEmail"
      ></bbns-column>
      <bbns-column title="<?=_("Extra Adresses")?>"
                  width="200"
                  field="extra_addresses"
      ></bbns-column>
      <bbns-column title="<?=_("Last logins")?>"
                  field="last_logins"
                  width="150"
      ></bbns-column>
      <bbns-column title="<?=_("Quota")?>"
                  cls="bbn-c"
                  :render="renderQuota"
                  field="total_info"
      ></bbns-column>
      <bbns-column :tcomponent="$options.components.newUser"
                  :width="100"
                  cls="bbn-c"
                  :buttons="[{
                    text: '<?=_("Edit")?>',
                    action: editUser,
                    notext: true,
                    icon: 'nf nf-fa-edit'
                  },{
                    text: '<?=_("Delete User")?>',
                    action: deleteUser,
                    icon: 'nf nf-fa-trash',
                    notext: true
                  }]"
      ></bbns-column>
    </bbn-table>
  </div>
</div>
