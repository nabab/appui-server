<bbn-table :scrollable="true"
           :source="root + 'data/domains'"
           :filterable="true"
           :server-filtering="false"
           :pageable="true"
           :server-paging="false"
           :showable="true"
           :zoomable="true"
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
            :max-row-height="100"
            ref="table">
  <bbns-column field="name"
               :label="_('Name')"
               :width="200"
               group="info"
               :fixed="true"
               :render="renderName"/>
  <bbns-column field="description"
               :label="_('Description')"
               :width="200"
               group="info"/>
  <bbns-column field="created_on"
               :label="_('Created on')"
               :width="150"
               group="info"/>
  <bbns-column field="type"
               :label="_('Type')"
               :width="100"
               group="info"/>
  <bbns-column field="disabled"
               :label="_('Disabled')"
               :width="100"
               group="info"/>
  <bbns-column field="features"
               :label="_('Features')"
               :width="100"
               :render="renderSpace"
               group="info"/>
  <bbns-column field="ip_address"
               :label="_('IP address')"
               :width="200"
               group="info"/>
  <bbns-column field="default_website_for_ip"
               :label="_('Default website for ip')"
               :width="60"
               group="info"/>
  <bbns-column field="url"
               :label="_('URL')"
               :width="200"
               group="info"/>
  <bbns-column field="user_id"
               :label="_('User ID')"
               :width="80"
               group="info"/>
  <bbns-column field="username"
               :label="_('Username')"
               :width="100"
               group="info"/>
  <bbns-column field="contact_address"
               :label="_('Contact address')"
               :width="200"
               group="info"/>
  <bbns-column field="mailbox_username_prefix"
               :label="_('Mailbox username prefix')"
               :width="100"
               group="info"/>
  <bbns-column field="password_storage"
               :label="_('Password storage')"
               :width="100"
               group="info"/>
  <bbns-column field="parent_domain"
               :flabel="_('Parent domain')"
               :label="_('Domain')"
               :width="200"
               group="parent"
               :render="renderName"/>
  <bbns-column field="parent_dns_virtual_server"
               :flabel="_('Parent DNS virtual server')"
               :label="_('DNS virtual server')"
               :width="150"
               group="parent"/>
  <bbns-column field="home_directory"
               :flabel="_('Home directory')"
               :label="_('Home')"
               :width="200"
               group="path"/>
  <bbns-column field="html_directory"
               :flabel="_('HTML directory')"
               :label="_('HTML')"
               :width="200"
               group="path"/>
  <bbns-column field="access_log"
               :label="_('Access log')"
               :width="200"
               group="path"/>
  <bbns-column field="error_log"
               :label="_('Error log')"
               :width="200"
               group="path"/>
  <bbns-column field="ssl_cert_file"
               :flabel="_('SSL certificate')"
               :label="_('Certificate')"
               :width="200"
               group="ssl"/>
  <bbns-column field="ssl_key_file"
               :flabel="_('SSL certificate key')"
               :label="_('Certificate key')"
               :width="200"
               group="ssl"/>
  <bbns-column field="ssl_cert_expiry"
               :flabel="_('SSL certificate expiry')"
               :label="_('Certificate expiry')"
               :width="150"
               group="ssl"/>
  <bbns-column field="lets_encrypt_cert_issued"
               :label="_('Let\'s Encrypt issued')"
               :width="150"
               group="ssl"/>
  <bbns-column field="lets_encrypt_renewal"
               :label="_('Let\'s Encrypt renewal')"
               :width="100"
               group="ssl"/>
  <bbns-column field="ssl_candidate_hostnames"
               :flabel="_('SSL candidate hostnames')"
               :label="_('Candidate hostnames')"
               :width="200"
               :render="renderSpace"
               group="ssl"/>
  <bbns-column field="ssl_cert_used_by"
               :flabel="_('SSL certificate used by')"
               :label="_('Certificate used by')"
               :render="renderArray"
               :width="250"
               group="ssl"/>
  <bbns-column field="php_version"
               :flabel="_('PHP version')"
               :label="_('Version')"
               :width="60"
               group="php"/>
  <bbns-column field="php_execution_mode"
               :flabel="_('PHP execution mode')"
               :label="_('Execution mode')"
               :width="100"
               group="php"/>
  <bbns-column field="possible_php_execution_modes"
               :flabel="_('PHP execution modes')"
               :label="_('Execution modes')"
               :width="100"
               :render="renderSpace"
               group="php"/>
  <bbns-column field="php_max_execution_time"
               :flabel="_('PHP max execution time')"
               :label="_('Max execution time')"
               :width="100"
               group="php"/>
  <bbns-column field="provisioning_for_virus"
               :flabel="_('Provisioning for virus')"
               :label="_('Virus')"
               :width="100"
               group="provisioning"/>
  <bbns-column field="provisioning_for_spam"
               :flabel="_('Provisioning for spam')"
               :label="_('Spam')"
               :width="100"
               group="provisioning"/>
  <bbns-column field="provisioning_for_mysql"
               :flabel="_('Provisioning for MySQL')"
               :label="_('MySQL')"
               :width="100"
               group="provisioning"/>
  <bbns-column field="provisioning_for_dns"
               :flabel="_('Provisioning for DNS')"
               :label="_('DNS')"
               :width="100"
               group="provisioning"/>
  <bbns-column field="dns"
               :flabel="_('DNS records')"
               :label="_('DNS records')"
               :width="400"
               :render="renderDns"/>
  <bbns-column field="backups_succeeded"
               :flabel="_('Last 5 succeeded backups')"
               :label="_('Last 5 succeeded')"
               :width="400"
               :render="renderBackups"
               group="backups"/>
  <bbns-column field="backups_failed"
               :flabel="_('Last 5 failed backups')"
               :label="_('Last 5 failed')"
               :width="400"
               :render="renderBackups"
               group="backups"/>
  <bbns-column field="users"
               :flabel="_('Users name')"
               :label="_('Name')"
               :width="200"
               :render="renderUsers"
               group="users"/>
  <bbns-column field="users"
               :flabel="_('Users quota')"
               :label="_('Quota')"
               :width="200"
               :render="renderUsersQuota"
               group="users"/>
  <bbns-column field="users"
               :flabel="_('Users real name')"
               :label="_('Real name')"
               :width="200"
               :render="renderUsersRealName"
               group="users"/>
  <bbns-column field="users"
               :flabel="_('Users disabled')"
               :label="_('Disabled')"
               :width="200"
               :render="renderUsersDisabled"
               group="users"/>
  <bbns-column field="users"
               :flabel="_('Users FTP access')"
               :label="_('FTP access')"
               :width="200"
               :render="renderUsersFTP"
               group="users"/>
</bbn-table>