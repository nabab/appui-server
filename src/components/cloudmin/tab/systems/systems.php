<div class="appui-server-cloudmin-tab-systems">
  <bbn-table :order="[{field: 'name', dir: 'ASC'}]"
             :sortable="true"
             ref="table"
             :source="root + '/data/cloudmin/systems'"
             :showable="true"
             :pageable="true">
    <bbns-column label="<?= _("Systems") ?>"
                 field="name"
                 cls="bbn-b"
                 :render="renderSystem"/>
    <bbns-column label="<?= _("Type") ?>"
                 field="value"
                 cls="bbn-c"
                 :width="120"
                 :render="renderType"/>
    <bbns-column label="<?= _("OS") ?>"
                 field="value"
                 cls="bbn-c"
                 :render="renderOs"
                 :invisible="true"/>
    <bbns-column label="<?= _("Ip") ?>"
                 field="value"
                 cls="bbn-c"
                 :render="renderIp"/>
    <bbns-column label="<?= _("MAC Address") ?>"
                 field="name"
                 cls="bbn-c"
                 :render="renderMac"
                 :invisible="true"/>
    <bbns-column label="<?= _("Domains") ?>"
                 field="value"
                 :render="renderTotDomains"
                 cls="bbn-c"
                 :width="80"/>
    <bbns-column label="<?= _("RAM") ?>"
                 field="value"
                 :render="renderRealMemory"
                 cls="bbn-c"
                 :width="100"/>
    <bbns-column label="<?= _("Disk space") ?>"
                 field="value"
                 cls="bbn-c"
                 :render="renderDiskSpace"/>
    <bbns-column label="<?= _("Backups") ?>"
                 field="value"
                 :render="renderBackups"
                 cls="bbn-c"
                 :width="50"
                 :invisible="true"/>
    <bbns-column label="<?= _("Updates") ?>"
                 field="value"
                 :render="renderUpdates"
                 cls="bbn-c"
                 :width="100"
                 :invisible="true"/>
  </bbn-table>
</div>
