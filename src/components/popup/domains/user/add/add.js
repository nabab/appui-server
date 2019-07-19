(()=>{
  return {
    data(){
      return {
        actionPost : this.source.root + 'actions/domains/tab_users/create_user',
        showQuota: 'unlimited',
        ftpInit: false,
        no_emailInit : false,
        dataForm: {
          new_user: '',
          password: '',
          quota: 0,
          ftp: false,
          no_email: false,
          extra_email: ''
        }
      }
    },
    computed:{
      complementaryData(){
        //if ( !$.isEmptyObject(this.dataForm) ){
        if ( Object.entries(this.dataForm).length ){  
          return {
            user: this.dataForm.new_user,
            pass: this.dataForm.password,
            quota: this.showQuota === 'limited' ? this.dataForm.quota : 'UNLIMITED',
            ftp: this.dataForm.ftp === true ? 1 : 0,
            noemail: this.dataForm.no_email === true ? 1 : 0,
            extra: this.dataForm.extra_email
          }
        }
      }
    }
  }
})();
