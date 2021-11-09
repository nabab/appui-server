(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/',
        cp: this.closest('bbn-container').find('appui-server-domains'),
        pswdVisible: false,
        featuresLoading: false,
        features: []
      };
    },
    computed: {
      domains(){
        let table = this.cp.getRef('table');
        if (table) {
          return bbn.fn.map(table.currentData, d => d.data.name);
        }
        return [];
      },
      pswdIcon(){
        return !!this.pswdVisible ? 'nf nf-fa-eye_slash' : 'nf nf-fa-eye';
      },
      pswdType(){
        return !!this.pswdVisible ? 'text' : 'password';
      },
      currentFeatures(){
        let features = bbn.fn.filter(this.features, f => {
          return (f.automatic.toLowerCase() === 'no') && (f.enabled.toLowerCase() === 'yes');
        });
        return bbn.fn.order(bbn.fn.map(features, f => {
          return {
            default: f.default.toLowerCase() === 'yes',
            text: f.description,
            value: f.name
          };
        }), 'text', 'asc');
      }
    },
    methods: {
      generatePswd(){
        this.source.password = bbn.fn.randomString(15, 20);
        navigator.clipboard.writeText(this.source.password).then(() => {
          appui.info(bbn._('The password has been copied to the clipboard'), 5);
        });
      },
      getFeatures(domain){
        this.featuresLoading = true;
        this.features.splice(0);
        this.$set(this.source, 'features', {});
        this.post(this.root + 'data/domain/features', {
          server: this.source.server,
          type: this.source.type,
          domain: domain
        }, d => {
          if (d.success) {
            this.features.splice(0, this.features.length, ...d.data);
            bbn.fn.each(d.data, f => {
              if ((f.automatic.toLowerCase() === 'no') && (f.enabled.toLowerCase() === 'yes')) {
                this.source.features[f.name] = f.default.toLowerCase() === 'yes' ? 1 : 0;
              }
            });
          }
          this.featuresLoading = false;
        });
      },
      setSuffix(){
        if ((this.source.type === 'sub')
          && this.source.name.length
          && this.source.parent.length
          && !this.source.name.endsWith(this.source.parent)
        ) {
          this.source.name += (!this.source.name.endsWith('.') ? '.' : '') + this.source.parent;
        }
      },
      onSuccess(d){
        if (d.success) {
          appui.success();
          this.cp.getRef('table').updateData();
          bbn.fn.link(`${this.root}ui/server/${this.source.server}/domain/${this.source.name}`);
        }
        else {
          appui.error();
        }
      }
    },
    created(){
      this.getFeatures();
    },
    watch: {
      'source.type'(val){
        this.features.splice(0);
        if (val === 'top') {
          this.getFeatures();
        }
        else if (!!this.source.parent) {
          this.getFeatures(this.source.parent);
        }
      },
      'source.parent'(val){
        this.getFeatures(val);
      }
    }
  };
})();
