(()=>{
  return {
    data(){
      return {
        actionPost: this.source.row.root + 'actions/domains/tab_users/modify_user',
        showQuota: this.source.row.total_quota === 'Unlimited' ? 'unlimited' : 'limited',
        email: this.source.row.email_address !== null ? 'Yes' : 'No',
        dataForm: {
          extra_emails: this.source.row.extra_addresses === null ? " " : this.source.row.extra_addresses,
          password:''
        },
        original:{
          user: this.source.row.user,
          quota: this.source.row.total_byte_quota,
          disabled: this.source.row.disabled,
          extra_emails: this.source.row.extra_addresses === null ? " " : this.source.row.extra_addresses,
          ftp: this.source.row.ftp_user,
          email: this.email
        }
      }
    },
    methods:{
      successEditUser(d){
        if( d.success ){
          appui.success(bbn._("success"));
        }
        else{
          appui.error(bbn._("Error"));
        }
      }
    },
    computed:{
      complementaryData(){
        let obj = {
          server: this.source.row.server,
          domain: this.source.row.domain,
          user: this.original.user,
          //these two properties even if empty are sent then will be managed in the server
          original_extra_email: this.original.extra_emails,
          extra_email: this.dataForm.extra_emails
        };
        //for rename or no user
        if( this.original.user !== this.source.row.user ){
          obj.newuser = this.source.row.user;
        }
        //for add quota if it's different
        if( this.original.quota !== this.source.row.total_byte_quota ){
          obj.quota= this.showQuota === 'limited' ? this.source.row.total_byte_quota : 'UNLIMITED';
        }
        // add new property for a new password
        if ( this.dataForm.password.length > 0 ){
          obj.pass = this.dataForm.password;
        }
        //add new property for disabled or enabled users  if it's different
        if ( this.original.disabled !== this.source.row.disabled ){
          if ( this.source.row.disabled === 'Yes' ){
            obj.disable = 1;
          }
          else{
            obj.enable = 1;
          }
        }
        //add new property for disabled or enabled ftp if it's different
        if ( this.original.ftp !== this.source.row.ftp_user ){
          if ( this.source.row.ftp_user === 'No'){
            obj.disable_ftp = 1;
          }
          else{
            obj.enable_ftp = 1;
          }
        }
        //add new property for disabled or enabled email if it's different
        if ( this.original.email !== this.email ){
          if ( this.email === 'Yes' ){
            obj.enable_email = 1
          }
          else{
            obj.disable_email =  1
          }
        }
        return obj;
      }
    }
  }
})();
