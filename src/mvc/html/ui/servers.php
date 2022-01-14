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
               :title="_('Name')"
               :width="200"
               group="info"
               :fixed="true"
               :render="renderName"/>
  <bbns-column field="hostname"
               :title="_('Hostname')"
               :width="200"
               group="info"/>
  <bbns-column field="cloudmin"
               :title="_('Cloudmin')"
               :width="100"
               group="info"
               :render="renderCloudmin"
               cls="bbn-c"/>
  <bbns-column field="domains"
               :title="_('#Domains')"
               :width="100"
               group="info"
               cls="bbn-c"/>
  <bbns-column field="uptime"
               :title="_('Uptime')"
               :width="120"
               group="info"
               :render="renderUptime"
               :filterable="false"/>
  <bbns-column field="os"
               :title="_('Name')"
               :width="150"
               group="os"/>
  <bbns-column field="arch"
               :title="_('Architecture')"
               :width="100"
               group="os"/>
  <bbns-column field="version"
               :title="_('Kernel')"
               :width="150"
               group="os"/>
  <bbns-column field="webminversion"
               :title="_('Webmin')"
               :width="150"
               group="web"/>
  <bbns-column field="virtualminversion"
               :title="_('Virtualmin')"
               :width="150"
               group="web"/>
  <bbns-column field="themeversion"
               :title="_('Theme')"
               :width="150"
               group="web"/>
  <bbns-column field="apache_version"
               :title="_('Apache version')"
               :width="150"
               group="services"/>
  <bbns-column field="bind_version"
               :title="_('BIND version')"
               :width="150"
               group="services"/>
  <bbns-column field="php_versions"
               :title="_('PHP versions')"
               :width="150"
               group="services"/>
  <bbns-column field="postfix_version"
               :title="_('Postfix version')"
               :width="150"
               group="services"/>
  <bbns-column field="proftpd_version"
               :title="_('ProFTP version')"
               :width="150"
               group="services"/>
  <bbns-column field="perl_version"
               :title="_('Perl version')"
               :width="150"
               group="services"/>
  <bbns-column field="python_version"
               :title="_('Python versions')"
               :width="150"
               group="services"/>
  <bbns-column field="logrotate_version"
               :title="_('Logrotate version')"
               :width="150"
               group="services"/>
  <bbns-column :buttons="[{
                 text: _('Open'),
                 icon: 'nf nf-mdi-open_in_app',
                 notext: true,
                 action: open
               }, {
                 text: _('Open on browser'),
                 icon: 'nf nf-mdi-open_in_new',
                 notext: true,
                 action: openExt
               }, {
                 text: _('Force cache reload'),
                 icon: 'nf nf-mdi-cached',
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