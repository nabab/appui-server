(() => {
  return {
    computed: {
      chartData(){
        let labels = [],
            series = [];
        if (!!this.source && !!this.source.items) {
          series = this.source.items;
          bbn.fn.each(this.source.items, (c, i) => {
            labels.push(bbn._('CPU') + (i+1));
          });
        }
        return {
          labels: labels,
          series: series
        }
      },
      chartCfg(){
        let t = 0;
        if (!!this.source && !!this.source.items) {
          bbn.fn.each(this.source.items, i => {
            t += i * 100 / this.source.items.length / 100;
          });
        }
        return {
          plotOptions: {
            radialBar: {
              dataLabels: {
                total: {
                  show: true,
                  label: bbn._('CPU'),
                  formatter(){
                    return t.toFixed(1) + '%';
                  }
                }
              }
            }
          }
        }
      }
    },
    methods: {
      legendRender(seriesName, opts) {
        return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex] + '%';
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