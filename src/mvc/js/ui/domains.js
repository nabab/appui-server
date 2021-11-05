(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/'
      }
    },
    methods: {
      renderArray(row, col){
        if (bbn.fn.isArray(row[col.field])) {
          let ret = '';
          bbn.fn.each(row[col.field], (v, i) => {
            ret += v + (row[col.field][i + 1] !== undefined ? '<br>' : '');
          });
          return ret;
        }
        return row[col.field];
      },
      renderSpace(row, col){
        return row[col.field].replaceAll(' ', '<br>');
      },
      renderDns(row){
        let ret = '';
        if (bbn.fn.isArray(row.dns)) {
          bbn.fn.each(row.dns, (d, i) => {
            ret += `${d.name}  ${d.class}  ${d.type}  ${bbn.fn.isArray(d.value) ? d.value.join(' ') : d.value}`;
            if (row.dns[i + 1] !== undefined) {
              ret += '<br>';
            }
          });
        }
        return ret;
      },
      renderBackups(row, col){
        let ret = '';
        if (row[col.field] && bbn.fn.isArray(row[col.field])) {
          bbn.fn.each(row[col.field], (d, i) => {
            ret += bbn._('Date') + `: ${d.started}<br>` +
              bbn._('File size') + `: ${bbn.fn.formatBytes(d.final_size || 0)}<br>` +
              bbn._('Destination') + `: ${d.destination.substr(d.destination.indexOf('@') + 1)}` +
              (row[col.field][i + 1] !== undefined ? '<br><br>' : '');
          });
        }
        return ret;
      }
    }
  }
})();