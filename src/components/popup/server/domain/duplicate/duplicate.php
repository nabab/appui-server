<bbn-form
          :action="actionPost"
          :source="complementary"
          :data="info"
          ref="form_duplicate_doamains"
          confirm-leave="<?=_("Are you sure you want to close?")?>"
>
  <div class="bbn-padded bbn-overlay bbn-vmiddle bbn-grid-fields">
    <label class="bbn-r">
      <?=_("New Domain")?>
    </label>
    <bbn-input name="new_domain" v-model="source.domain"></bbn-input>
  </div>
</bbn-form>
