(() => {
  return {
    data(){
      return {
        details: false
      }
    },
    computed: {
      chartData(){
        let labels = [],
            series = [],
            values = [];
        if (!!this.source && !!this.source.items) {
          bbn.fn.each(this.source.items, it => {
            labels.push(it.device);
            series.push(this.getPerc(it.total, parseInt(it.total) - parseInt(it.free)));
            values.push({
              device: it.device,
              size: this.getSize(it.total, parseInt(it.total) - parseInt(it.free)),
              fs: it.type,
              mount: it.dir
            });
          });
        }
        return {
          labels: labels,
          series: series,
          values: values
        };
      },
      chartCfg(){
        let t = 0,
            u = 0,
            d = 0;
        if (!!this.source && !!this.source.items) {
          bbn.fn.each(this.source.items, it => {
            u += parseInt(it.total) - parseInt(it.free);
            d += parseInt(it.total);
          });
          t = this.getPerc(d, u);
        }
        t = t + '%';
        return {
          plotOptions: {
            radialBar: {
              dataLabels: {
                total: {
                  show: true,
                  label: bbn._('USED'),
                  formatter(){
                    return t;
                  }
                }
              }
            }
          }
        }
      }
    },
    methods: {
      getPerc(tot, used){
        return !!parseInt(tot) ? (parseInt(used) / parseInt(tot) * 100).toFixed(1) : 0;
      },
      getSize(tot, used){
        used = bbn.fn.formatBytes(used, 3);
        tot = bbn.fn.formatBytes(tot, 3);
        let usedIdx = used.indexOf(' '),
            totIdx = tot.indexOf(' ');
        return  parseFloat(used.substring(0, usedIdx)).toFixed(2) + used.substring(usedIdx) + ' / ' +
          parseFloat(tot.substring(0, totIdx)).toFixed(2) + tot.substring(totIdx);
      },
      legendRender(seriesName, opts) {
        return this.chartData.values[opts.seriesIndex].mount + ' - ' + opts.w.globals.series[opts.seriesIndex] + '% (' + this.chartData.values[opts.seriesIndex].size + ')';
      },
      forceRefresh(){
        let widget = this.closest('bbn-widget');
        widget.data.force = true;
        widget.$once('loaded', () => {
          delete widget.data.force;
        });
        widget.reload();
      }
    },
    watch: {
      chartCfg: {
        deep: true,
        handler(){
          this.getRef('chart').init();
        }
      }
    }
  }
})();