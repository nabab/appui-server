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
              value: 'os',
              text: _('Operating System')
            }, {
              value: 'web',
              text: _('Webmin | Virtualmin')
            }, {
              value: 'services',
              text: _('Services')
            }]"
            ref="table"
            :toolbar="[{
              text: _('Add'),
              icon: 'nf nf-fa-plus',
              action: add
            }]">
  <bbns-column field="name"
               :label="_('Name')"
               :width="200"
               group="info"
               :fixed="true"
               :render="renderName"/>
  <bbns-column field="hostname"
               :label="_('Hostname')"
               :width="200"
               group="info"/>
  <bbns-column field="cloudmin"
               :label="_('Cloudmin')"
               :width="100"
               group="info"
               :render="renderCloudmin"
               cls="bbn-c"/>
  <bbns-column field="domains"
               :label="_('#Domains')"
               :width="100"
               group="info"
               cls="bbn-c"/>
  <bbns-column field="uptime"
               :label="_('Uptime')"
               :width="120"
               group="info"
               :render="renderUptime"
               :filterable="false"/>
  <bbns-column field="os"
               :label="_('Name')"
               :width="150"
               group="os"/>
  <bbns-column field="arch"
               :label="_('Architecture')"
               :width="100"
               group="os"/>
  <bbns-column field="version"
               :label="_('Kernel')"
               :width="150"
               group="os"/>
  <bbns-column field="webminversion"
               :label="_('Webmin')"
               :width="150"
               group="web"/>
  <bbns-column field="virtualminversion"
               :label="_('Virtualmin')"
               :width="150"
               group="web"/>
  <bbns-column field="themeversion"
               :label="_('Theme')"
               :width="150"
               group="web"/>
  <bbns-column field="apache_version"
               :label="_('Apache version')"
               :width="150"
               group="services"/>
  <bbns-column field="bind_version"
               :label="_('BIND version')"
               :width="150"
               group="services"/>
  <bbns-column field="php_versions"
               :label="_('PHP versions')"
               :width="150"
               group="services"/>
  <bbns-column field="postfix_version"
               :label="_('Postfix version')"
               :width="150"
               group="services"/>
  <bbns-column field="proftpd_version"
               :label="_('ProFTP version')"
               :width="150"
               group="services"/>
  <bbns-column field="perl_version"
               :label="_('Perl version')"
               :width="150"
               group="services"/>
  <bbns-column field="python_version"
               :label="_('Python versions')"
               :width="150"
               group="services"/>
  <bbns-column field="logrotate_version"
               :label="_('Logrotate version')"
               :width="150"
               group="services"/>
  <bbns-column :buttons="[{
                 text: _('Open'),
                 icon: 'nf nf-md-open_in_app',
                 notext: true,
                 action: open
               }, {
                 text: _('Open on browser'),
                 icon: 'nf nf-md-open_in_new',
                 notext: true,
                 action: openExt
               }, {
                 text: _('Force cache reload'),
                 icon: 'nf nf-md-cached',
                 notext: true,
                 action: reloadCache
               }, {
                 text: _('Edit'),
                 icon: 'nf nf-fa-edit',
                 notext: true,
                 action: edit
               }, {
                 text: _('Delete'),
                 icon: 'nf nf-fa-trash',
                 notext: true,
                 action: remove
               }]"
               fixed="right"
               :width="180"
               cls="bbn-c"/>
</bbn-table>