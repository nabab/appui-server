<div class="appui-server-cloudmin-tab-systems">
  <bbn-table :order="[{field: 'name', dir: 'ASC'}]"
             :sortable="true"
             ref="table"
             :source="root+'/data/cloudmin/systems'"
             :showable="true"
             :pageable="true"
  >
    <bbns-column title="<?=_("Systems")?>"
                field="name"
                cls="bbn-b"
                :render="renderSystem"
    ></bbns-column>
    <bbns-column title="<?=_("Type")?>"
                field="value"
                cls="bbn-c"
                :width="120"
                :render="renderType"
    ></bbns-column>
    <bbns-column title="<?=_("OS")?>"
                field="value"
                cls="bbn-c"
                :render="renderOs"
                :hidden="true"
    ></bbns-column>
    <bbns-column title="<?=_("Ip")?>"
                field="value"
                cls="bbn-c"
                :render="renderIp"
      ></bbns-column>
    <bbns-column title="<?=_("MAC Address")?>"
                field="name"
                cls="bbn-c"
                :render="renderMac"
                :hidden="true"
    ></bbns-column>
    <bbns-column title="<?=_("Domains")?>"
                field="value"
                :render="renderTotDomains"
                cls="bbn-c"
                :width="80"
    ></bbns-column>
    <bbns-column title="<?=_("RAM")?>"
                field="value"
                :render="renderRealMemory"
                cls="bbn-c"
                :width="100"
    ></bbns-column>
    <bbns-column title="<?=_("Disk space")?>"
                field="value"
                cls="bbn-c"
                :render="renderDiskSpace"
    ></bbns-column>
    <bbns-column title="<?=_("Backups")?>"
                field="value"
                :render="renderBackups"
                cls="bbn-c"
                :width="50"
                :hidden="true"
    ></bbns-column>
    <bbns-column title="<?=_("Updates")?>"
                field="value"
                :render="renderUpdates"
                cls="bbn-c"
                :width="100"
                :hidden="true"
    ></bbns-column>
  </bbn-table>
</div>
