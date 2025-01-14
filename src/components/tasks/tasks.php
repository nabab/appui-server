<div class="appui-server-tasks bbn-overlay">
  <bbn-table :source="root + 'data/tasks'"
             :filterable="true"
             :pageable="true"
             :data="{
               server: !!source && !!source.server ? source.server : false
             }"
             :tr-class="trCls"
             ref="table"
             :max-row-height="100"
             :zoomable="true">
    <bbns-column field="id"
                 label="<?= _('ID') ?>"
                 :width="80"/>
    <bbns-column field="server"
                 label="<?= _('Server') ?>"
                 v-if="!source || !source.server"
                 :render="renderServer"/>
    <bbns-column field="created"
                 label="<?= _('Created') ?>"
                 type="datetime"
                 cls="bbn-c"
                 :render="renderDate"
                 :width="150"/>
    <bbns-column field="user"
                 label="<?= _('User') ?>"
                 :source="users"/>
    <bbns-column field="method"
                 label="<?= _('Action') ?>"/>
    <bbns-column field="args"
                 label="<?= _('Arguments') ?>"
                 :render="renderArgs"/>
    <bbns-column field="start"
                 label="<?= _('Start') ?>"
                 type="datetime"
                 cls="bbn-c"
                 :render="renderDate"
                 :width="150"/>
    <bbns-column field="end"
                 label="<?= _('End') ?>"
                 type="datetime"
                 cls="bbn-c"
                 :render="renderDate"
                 :width="150"/>
    <bbns-column field="failed"
                 label="<?= _('Failed') ?>"
                 :render="renderFailed"
                 cls="bbn-c"
                 :width="70"/>
    <bbns-column field="error"
                 label="<?= _('Error Message') ?>"/>
    <bbns-column cls="bbn-c"
                 :width="70"
                 :buttons="getButtons"/>
  </bbn-table>
</div>
