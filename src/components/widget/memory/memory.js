(() => {
  return {
    computed: {
      chartData(){
        let series = [],
            values = [];
        if (!!this.source && !!this.source.items) {
          series.push(this.getPerc(this.source.items.realTotal, this.source.items.realUsed));
          values.push(this.getSize(this.source.items.realTotal, this.source.items.realUsed));
          series.push(this.getPerc(this.source.items.swapTotal, this.source.items.swapUsed));
          values.push(this.getSize(this.source.items.swapTotal, this.source.items.swapUsed));
        }
        return {
          labels: [
            bbn._('REAL'),
            bbn._('SWAP')
          ],
          series: series,
          values: values
        }
      },
      chartCfg(){
        let t = '0%';
        if (!!this.source && !!this.source.items) {
          let u = parseInt(this.source.items.realUsed) + parseInt(this.source.items.swapUsed),
              d = parseInt(this.source.items.realTotal) + parseInt(this.source.items.swapTotal);
          t = (u / d * 100).toFixed(1) + '%';
        }        
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
              },
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
        used = bbn.fn.formatBytes(used * 1024, 3);
        tot = bbn.fn.formatBytes(tot * 1024, 3);
        let usedIdx = used.indexOf(' '),
            totIdx = tot.indexOf(' ');
        return  parseFloat(used.substr(0, usedIdx)).toFixed(2) + used.substr(usedIdx) + ' / ' +
          parseFloat(tot.substr(0, totIdx)).toFixed(2) + tot.substr(totIdx);
      },
      legendRender(seriesName, opts) {
        return seriesName + ':  ' + opts.w.globals.series[opts.seriesIndex] + '% (' + this.chartData.values[opts.seriesIndex] + ')';
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