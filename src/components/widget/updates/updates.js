(() => {
  return {
    methods: {
      forceRefresh(){
        let widget = this.closest('bbn-widget');
        widget.data.force = true;
        widget.$once('loaded', () => {
          delete widget.data.force;
        });
        widget.reload();
      },
      render(row){
        return `
<div>
  <div class="bbn-b">${row.desc}</div>
  <div>${row.name}</div>
  <div class="bbn-i">${row.version}</div>
</div>
        `;
      }
    }
  }
})();