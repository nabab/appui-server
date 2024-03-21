<bbn-form
         :action="actionPost"
         :source="source"
         ref="form_modify_user"
         confirm-leave="<?= _("Are you sure you want to close?") ?>"
>
  <div class="bbn-c bbn-flex-height">
    <div>
      <div class="bbn-padded bbn-flex-width">
        <div><?= _('Data start') ?></div>
        <div class="bbn-flex-fill">
          <bbn-datepicker type="date"
                     v-model="source.autoreply_start"
          ></bbn-datepicker>
        </div>
      </div>
      <div class="bbn-padded bbn-flex-width">
        <div><?= _('Data end') ?></div>
        <div class="bbn-flex-fill">
          <bbn-datepicker type="date"
                     v-model="source.autoreply_end"
         ></bbn-datepicker>
        </div>
      </div>
    </div>
    <div>
      <div class="bbn-flex-width">
        <div><?= _('Message') ?></div>
        <div class="bbn-flex-fill">
          <bbn-textarea  class=""style="width: 100%; height: 300px"
                        v-model="source.email_autoreply"
          ></bbn-textarea>
        </div>
      </div>
    </div>
 </div>
</bbn-form>
