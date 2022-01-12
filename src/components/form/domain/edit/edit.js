(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/',
        cp: this.closest('bbn-container').find('appui-server-domains'),
        pswdVisible: false,
        pswdDisabled: true,
        featuresLoading: false,
        serverQuota: !!this.source.row.serverQuota ? 'defined' : 'unlimited',
        userQuota: !!this.source.row.userQuota ? 'defined' : 'unlimited'
      };
    },
    computed: {
      pswdIcon(){
        return !!this.pswdVisible ? 'nf nf-fa-eye_slash' : 'nf nf-fa-eye';
      },
      pswdType(){
        return !!this.pswdVisible ? 'text' : 'password';
      },
      currentFeatures(){
        let features = bbn.fn.filter(this.source.row.availableFeatures, f => {
          return (f.automatic.toLowerCase() === 'no') && (f.enabled.toLowerCase() === 'yes');
        });
        return bbn.fn.order(bbn.fn.map(features, f => {
          return {
            text: f.description,
            value: f.name
          };
        }), 'text', 'asc');
      }
    },
    methods: {
      generatePswd(){
        this.source.row.password = bbn.fn.randomString(15, 20);
        navigator.clipboard.writeText(this.source.row.password).then(() => {
          appui.info(bbn._('The password has been copied to the clipboard'), 5);
        });
      },
      onValidation(d){
        if (this.pswdDisabled) {
          d.password = '';
        }
        return true;
      },
      onSuccess(d){
        if (d.success) {
          appui.success(bbn._('The action was added to the queue'));
        }
        else {
          appui.error(bbn._('Unable to add action to queue or already present'));
        }
      }
    },
    watch: {
      pswdDisabled(){
        this.source.row.password = '';
      }
    },
    components: {
      quota: {
        template: `
<div>
  <bbn-numeric v-model="bytes"
               :disabled="disabled"
               class="bbn-narrow"/>
  <bbn-dropdown :source="units"
                v-model="unit"
                :disabled="disabled"
                :autosize="true"/>
</div>
        `,
        props: {
          source: {
            type: Object
          },
          type: {
            type: String
          },
          disabled: {
            type: Boolean
          }
        },
        data(){
          let k = 1024,
              units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
              i = 2,
              bytes = this.source[this.type + 'Quota'];
          if (bytes) {
            i = Math.floor(Math.log(bytes) / Math.log(k));
            bytes = parseFloat((bytes / Math.pow(k, i)).toFixed(0));
          }
          return {
            bytes: bytes,
            unit: units[i],
            units: units
          };
        },
        watch: {
          unit(val){
            this.source[this.type + 'Quota'] = parseFloat((this.bytes * Math.pow(1024, this.units.indexOf(val))).toFixed(0));
          },
          bytes(val){
            this.source[this.type + 'Quota'] = parseFloat((val * Math.pow(1024, this.units.indexOf(this.unit))).toFixed(0));
          }
        }
      }
    }
  };
})();
