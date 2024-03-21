<bbn-form
          :action="actionPost"
          :source="source"
          :data="complementaryData"
          ref="form_new_user"
          confirm-leave="<?= _("Are you sure you want to close?") ?>"
          :prefilled="true"
>
  <div class="bbn-padded bbn-overlay bbn-grid-fields">
    <label class="bbn-r">
      <?= _("Domain") ?>
    </label>
    <bbn-input name="domain" v-model="source.domain" readonly></bbn-input>
    <label class="bbn-r">
      <?= _("New user") ?>
    </label>
    <bbn-input name="new_user" v-model="dataForm.new_user" required></bbn-input>
    <label class="bbn-r">
      <?= _("Password") ?>
    </label>
    <bbn-input name="password"
            v-model="dataForm.password"
            type="password"
            required
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
        <bbn-numeric v-model="dataForm.quota"></bbn-numeric>
      </div>
      <div v-else-if="showQuota === 'unlimited'">
        <span class="bbn-xl"><?= _('Unlimited') ?></span>
      </div>
    </div>
    <label><?= _('FTP') ?></label>
    <bbn-checkbox v-model="dataForm.ftp"
                  :value="!ftpInit"
    ></bbn-checkbox>
    <label><?= _('NO EMAIL') ?></label>
    <bbn-checkbox v-model="dataForm.no_email"
                  :value="!no_emailInit"
    ></bbn-checkbox>
    <label><?= _('Extra email') ?></label>
    <bbn-textarea  style="width: 100%; height: 100%" v-model="dataForm.extra_email"></bbn-textarea>
  </div>
</bbn-form>
