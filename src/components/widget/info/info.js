(() => {
  return {
    methods: {
      getUptime(){
        let dur = dayjs.duration(this.source.items.uptime * 1000),
            years = dur.format('Y'),
            months = dur.format('M'),
            days = dur.format('D'),
            hours = dur.format('H'),
            minutes = dur.format('m'),
            seconds = dur.format('s'),
            ret = seconds + 's';
        if (minutes > 0) {
          ret = minutes + 'm ' + ret;
        }
        if (hours > 0) {
          ret = hours + 'H ' + ret;
        }
        if (days > 0) {
          ret = days + 'D ' + ret;
        }
        if (months > 0) {
          ret = months + 'M ' + ret;
        }
        if (years > 0) {
          ret = years + 'Y ' + ret;
        }
        return ret;
      },
      forceRefresh(){
        let widget = this.closest('bbn-widget');
        widget.data.force = true;
        widget.$once('loaded', () => {
          delete widget.data.force;
        });
        widget.reload();
      }
    }
  }
})();