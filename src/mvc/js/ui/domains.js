(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-server'] + '/'
      }
    },
    methods: {
      renderName(row, col){
        return `<a href="${this.root}ui/server/${row.hostname}/domain/${row[col.field]}">${row[col.field]}</a>`;
      },
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
        return !!row && !!row[col.field] ? row[col.field].replaceAll(' ', '<br>') : '';
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
              bbn._('Destination') + `: ${d.destination.substring(d.destination.indexOf('@') + 1)}` +
              (row[col.field][i + 1] !== undefined ? '<br><br>' : '');
          });
        }
        return ret;
      },
      renderUsers(row){
        return this._renderUsers(row, 'name');
      },
      renderUsersQuota(row){
        let ret = '';
        if (row.users && row.users.length) {
          bbn.fn.each(row.users, (u, i) => {
            ret += bbn.fn.formatBytes(u.home_byte_quota_used) + ' / ' +
              (!!u.home_byte_quota && (u.home_byte_quota > 0) ? bbn.fn.formatBytes(u.home_byte_quota) : bbn._('Unlimited')) +
              (row.users[i + 1] !== undefined ? '<br>' : '');
          });
        }
        return ret;
      },
      renderUsersRealName(row){
        return this._renderUsers(row, 'real_name');
      },
      renderUsersDisabled(row){
        return this._renderUsers(row, 'disabled', true);
      },
      renderUsersFTP(row){
        return this._renderUsers(row, 'ftp_access', true);
      },
      _renderUsers(row, field, bool){
        let ret = '';
        if (row.users && row.users.length) {
          bbn.fn.each(row.users, (u, i) => {
            ret += (!!bool ? (u[field] === 'Yes' ? bbn._('Yes') : bbn._('No')) : u[field]) + (row.users[i + 1] !== undefined ? '<br>' : '');
          });
        }
        return ret;
      }
    }
  }
})();