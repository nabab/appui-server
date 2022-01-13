<bbn-table :scrollable="true"
           :source="root + 'data/servers'"
           :filterable="true"
           :server-filtering="false"
           :pageable="true"
           :server-paging="false"
           :showable="true"
           :title-groups="[{
              value: 'info',
              text: _('Info')
            }, {
              value: 'ssl',
              text: _('SSL certificate')
            }, {
              value: 'php',
              text: 'PHP'
            }, {
              value: 'provisioning',
              text: _('Provisioning')
            }, {
              value: 'path',
              text: _('Paths')
            }, {
              value: 'parent',
              text: _('Parent')
            }, {
              value: 'backups',
              text: _('Backups')
            }, {
              value: 'users',
              text: _('Users')
            }]"
            ref="table">
  <bbns-column field="name"
               :title="_('Name')"
               :width="200"
               group="info"
               :fixed="true"
               :render="renderName"/>
  <bbns-column field="description"
               :title="_('Description')"
               :width="200"
               group="info"/>
  <bbns-column field="created_on"
               :title="_('Created on')"
               :width="150"
               group="info"/>
  <bbns-column field="type"
               :title="_('Type')"
               :width="100"
               group="info"/>
  <bbns-column field="disabled"
               :title="_('Disabled')"
               :width="100"
               group="info"/>
  <bbns-column field="features"
               :title="_('Features')"
               :width="100"
               :render="renderSpace"
               group="info"/>
  <bbns-column field="ip_address"
               :title="_('IP address')"
               :width="200"
               group="info"/>
  <bbns-column field="default_website_for_ip"
               :title="_('Default website for ip')"
               :width="60"
               group="info"/>
  <bbns-column field="url"
               :title="_('URL')"
               :width="200"
               group="info"/>
  <bbns-column field="user_id"
               :title="_('User ID')"
               :width="80"
               group="info"/>
  <bbns-column field="username"
               :title="_('Username')"
               :width="100"
               group="info"/>
  <bbns-column field="contact_address"
               :title="_('Contact address')"
               :width="200"
               group="info"/>
  <bbns-column field="mailbox_username_prefix"
               :title="_('Mailbox username prefix')"
               :width="100"
               group="info"/>
  <bbns-column field="password_storage"
               :title="_('Password storage')"
               :width="100"
               group="info"/>
  <bbns-column field="parent_domain"
               :ftitle="_('Parent domain')"
               :title="_('Domain')"
               :width="200"
               group="parent"
               :render="renderName"/>
  <bbns-column field="parent_dns_virtual_server"
               :ftitle="_('Parent DNS virtual server')"
               :title="_('DNS virtual server')"
               :width="150"
               group="parent"/>
  <bbns-column field="home_directory"
               :ftitle="_('Home directory')"
               :title="_('Home')"
               :width="200"
               group="path"/>
  <bbns-column field="html_directory"
               :ftitle="_('HTML directory')"
               :title="_('HTML')"
               :width="200"
               group="path"/>
  <bbns-column field="access_log"
               :title="_('Access log')"
               :width="200"
               group="path"/>
  <bbns-column field="error_log"
               :title="_('Error log')"
               :width="200"
               group="path"/>
  <bbns-column field="ssl_cert_file"
               :ftitle="_('SSL certificate')"
               :title="_('Certificate')"
               :width="200"
               group="ssl"/>
  <bbns-column field="ssl_key_file"
               :ftitle="_('SSL certificate key')"
               :title="_('Certificate key')"
               :width="200"
               group="ssl"/>
  <bbns-column field="ssl_cert_expiry"
               :ftitle="_('SSL certificate expiry')"
               :title="_('Certificate expiry')"
               :width="150"
               group="ssl"/>
  <bbns-column field="lets_encrypt_cert_issued"
               :title="_('Let\'s Encrypt issued')"
               :width="150"
               group="ssl"/>
  <bbns-column field="lets_encrypt_renewal"
               :title="_('Let\'s Encrypt renewal')"
               :width="100"
               group="ssl"/>
  <bbns-column field="ssl_candidate_hostnames"
               :ftitle="_('SSL candidate hostnames')"
               :title="_('Candidate hostnames')"
               :width="200"
               :render="renderSpace"
               group="ssl"/>
  <bbns-column field="ssl_cert_used_by"
               :ftitle="_('SSL certificate used by')"
               :title="_('Certificate used by')"
               :render="renderArray"
               :width="250"
               group="ssl"/>
  <bbns-column field="php_version"
               :ftitle="_('PHP version')"
               :title="_('Version')"
               :width="60"
               group="php"/>
  <bbns-column field="php_execution_mode"
               :ftitle="_('PHP execution mode')"
               :title="_('Execution mode')"
               :width="100"
               group="php"/>
  <bbns-column field="possible_php_execution_modes"
               :ftitle="_('PHP execution modes')"
               :title="_('Execution modes')"
               :width="100"
               :render="renderSpace"
               group="php"/>
  <bbns-column field="php_max_execution_time"
               :ftitle="_('PHP max execution time')"
               :title="_('Max execution time')"
               :width="100"
               group="php"/>
  <bbns-column field="provisioning_for_virus"
               :ftitle="_('Provisioning for virus')"
               :title="_('Virus')"
               :width="100"
               group="provisioning"/>
  <bbns-column field="provisioning_for_spam"
               :ftitle="_('Provisioning for spam')"
               :title="_('Spam')"
               :width="100"
               group="provisioning"/>
  <bbns-column field="provisioning_for_mysql"
               :ftitle="_('Provisioning for MySQL')"
               :title="_('MySQL')"
               :width="100"
               group="provisioning"/>
  <bbns-column field="provisioning_for_dns"
               :ftitle="_('Provisioning for DNS')"
               :title="_('DNS')"
               :width="100"
               group="provisioning"/>
  <bbns-column field="dns"
               :ftitle="_('DNS records')"
               :title="_('DNS records')"
               :width="400"
               :render="renderDns"/>
  <bbns-column field="backups_succeeded"
               :ftitle="_('Last 5 succeeded backups')"
               :title="_('Last 5 succeeded')"
               :width="400"
               :render="renderBackups"
               group="backups"/>
  <bbns-column field="backups_failed"
               :ftitle="_('Last 5 failed backups')"
               :title="_('Last 5 failed')"
               :width="400"
               :render="renderBackups"
               group="backups"/>
  <bbns-column field="users"
               :ftitle="_('Users name')"
               :title="_('Name')"
               :width="200"
               :render="renderUsers"
               group="users"/>
  <bbns-column field="users"
               :ftitle="_('Users quota')"
               :title="_('Quota')"
               :width="200"
               :render="renderUsersQuota"
               group="users"/>
  <bbns-column field="users"
               :ftitle="_('Users real name')"
               :title="_('Real name')"
               :width="200"
               :render="renderUsersRealName"
               group="users"/>
  <bbns-column field="users"
               :ftitle="_('Users disabled')"
               :title="_('Disabled')"
               :width="200"
               :render="renderUsersDisabled"
               group="users"/>
  <bbns-column field="users"
               :ftitle="_('Users FTP access')"
               :title="_('FTP access')"
               :width="200"
               :render="renderUsersFTP"
               group="users"/>
</bbn-table>