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
                 title="<?= _('ID') ?>"
                 :width="80"/>
    <bbns-column field="server"
                 title="<?= _('Server') ?>"
                 v-if="!source || !source.server"
                 :render="renderServer"/>
    <bbns-column field="created"
                 title="<?= _('Created') ?>"
                 type="datetime"
                 cls="bbn-c"
                 :render="renderDate"
                 :width="150"/>
    <bbns-column field="user"
                 title="<?= _('User') ?>"
                 :source="users"/>
    <bbns-column field="method"
                 title="<?= _('Action') ?>"/>
    <bbns-column field="args"
                 title="<?= _('Arguments') ?>"
                 :render="renderArgs"/>
    <bbns-column field="start"
                 title="<?= _('Start') ?>"
                 type="datetime"
                 cls="bbn-c"
                 :render="renderDate"
                 :width="150"/>
    <bbns-column field="end"
                 title="<?= _('End') ?>"
                 type="datetime"
                 cls="bbn-c"
                 :render="renderDate"
                 :width="150"/>
    <bbns-column field="failed"
                 title="<?= _('Failed') ?>"
                 :render="renderFailed"
                 cls="bbn-c"
                 :width="70"/>
    <bbns-column field="error"
                 title="<?= _('Error Message') ?>"/>
    <bbns-column cls="bbn-c"
                 :width="70"
                 :buttons="getButtons"/>
  </bbn-table>
</div>
