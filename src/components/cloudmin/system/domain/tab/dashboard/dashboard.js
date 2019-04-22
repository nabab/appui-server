(() => {
  return {
    props: {
      source: {
        type: Object
      }
    },
    data(){
      return {
        titleWidget:{
          general: bbn._("General domain informations"),
          users: bbn._('List users')
        },
        general:{
          created: this.source.domain.values.created_on !== undefined ? this.source.domain.values.created_on[0] : '-',
          created_by: this.source.domain.values.created_by !== undefined ? this.source.domain.values.created_by[0] : '-',
          description: this.source.domain.values.description !== undefined ? this.source.domain.values.description[0] : '-',
          php_excution_mode: this.source.domain.values['php_execution_mode'] !== undefined ? this.source.domain.values['php_execution_mode'][0] : '-',
          php_fcgid_subprocesses: this.source.domain.values.php_fcgid_subprocesses !== undefined ? this.source.domain.values.php_fcgid_subprocesses[0] : '-',
          php_max_execution_time: this.source.domain.values.php_max_execution_time !== undefined ? this.source.domain.values.php_max_execution_time[0] : '-',
          php_version: this.source.domain.values.php_version !== undefined ? this.source.domain.values.php_version[0] : '-',
          shell_type: this.source.domain.values.shell_type !== undefined ? this.source.domain.values.shell_type[0] : '-',
          read_only_mode: this.source.domain.values['read-only_mode'] !== undefined ? this.source.domain.values['read-only_mode'][0] : '-',
        }
      }
    }
  }
})();
