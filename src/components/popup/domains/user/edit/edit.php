 <bbn-form
          :action="actionPost"
          :source="complementaryData"
          ref="form_modify_user"
          confirm-leave="<?= _("Are you sure you want to close?") ?>"
          @success="successEditUser"
        
>
  <div class="bbn-padding bbn-grid-fields">
    <label class="bbn-r">
      <?= _("Domain") ?>
    </label>
    <bbn-input name="domain" v-model="source.row.domain" readonly></bbn-input>
    <label class="bbn-r">
      <?= _("New user") ?>
    </label>
    <bbn-input name="user" v-model="source.row.user"></bbn-input>
    <label class="bbn-r">
      <?= _("State") ?>
    </label>
    <div class="bbn-vmiddle">
       <bbn-radio :source="[{
                    text: '<?= _("Enable") ?>',
                    value: 'No'
                  },{
                     text: '<?= _("Disabled") ?>',
                     value: 'Yes'
                  }]"
                  v-model="source.row.disabled"
       ></bbn-radio>
    </div>
    <label class="bbn-r">
      <?= _("FTP") ?>
    </label>
    <div class="bbn-vmiddle">
       <bbn-radio :source="[{
                    text: '<?= _("Enable") ?>',
                    value: 'Yes'
                  }, {
                    text: '<?= _("Disabled") ?>',
                    value: 'No'
                  }]"
                  v-model="source.row.ftp_user"
       ></bbn-radio>
    </div>
    <label><?= _('EMAIL') ?></label>
    <div class="bbn-vmiddle">
       <bbn-radio :source="[{
                    text: '<?= _("Enable") ?>',
                    value: 'Yes'
                  }, {
                    text: '<?= _("Disabled") ?>',
                    value: 'No'
                  }]"
                  v-model="email"
       ></bbn-radio>
    </div>
    <label class="bbn-r">
      <?= _("Password") ?>
    </label>
    <bbn-input name="password"
            v-model="dataForm.password"
            type="password"
    ></bbn-input>
    <label class="bbn-r">
      <?= _("Quota") ?>
    </label>
    <div class="bbn-vmiddle">
       <bbn-radio :source="[{
                    text: '<?= _("Unlimited") ?>',
                    value: 'unlimited'
                  }, {
                    text: '<?= _("Limited") ?>',
                    value: 'limited'
                  }]"
                  v-model="showQuota"
       ></bbn-radio>
    </div>
    <label>
    </label>
    <div>
      <div v-if="showQuota === 'limited'">
        <bbn-numeric  v-model="source.row.total_byte_quota"></bbn-numeric>
        <span>(kb)</span>
      </div>
      <div v-else-if="showQuota === 'unlimited'">
        <span class="bbn-xl"><?= _('Unlimited') ?></span>
      </div>
    </div>
    <label><?= _('Extra email') ?></label>
    <bbn-textarea  style="width: 100%; height: 100%" v-model="dataForm.extra_email"></bbn-textarea>
  </div>
</bbn-form>
