(() => {
  let users;
  let dataUser;
  return {
    methods:{
      renderDisabled(row){
        if( row.disabled === "Yes"){
          return  '<div class="bbn-c"><i style="color: red" class="nf nf-fa-user_times"></i></div>'
        }
        else{
            return  '<div class="bbn-c"><i style="color: green" class="nf nf-fa-user"></i></div>'
        }
      },
      renderFtp(row){
        if( row.ftp_user === "Yes"){
          return  '<div class="bbn-c"><i style="color: green" class="nf nf-fa-chevron_down"></i></div>'
        }
        else{
            return  '<div class="bbn-c"><i style="color: red" class="nf nf-fa-ban"></i></div>'
        }
      },
      renderQuota(row){
        if ( row.total_quota === "Unlimited" ) {
          return row.total_quota
        }
        else if( bbn.fn.isNumber(row.total_byte_quota_used) && bbn.fn.isNumber(row.total_byte_quota) ){
          let bar= (100*row.total_byte_quota_used)/row.total_byte_quota,
              color = "green";
          bar = bar > 100 ? 100 : bar;
          if ( (bar > 70) && (bar < 91) ){
            color = "orange";
          }
          if ((bar >= 91) && (bar <= 100)){
            color = "red";
          }
          return `<div class="bbn-w-100 bbn-flex-width">
                    <div class="bbn-w-20">`+ row.total_quota_used + `</div>
                    <div class="bbn-flex-fill" style="height: 80%; width:80%; border: 1px solid">
                      <div style="height: 12px; width:`+ bar +`% ; background-color:` + color +`"></div>
                    </div>
                    <div class="bbn-w-20">`+ row.total_quota + `</div>
                  </div>`
        }
      },
      renderReplayEmail(row){
        if ( (row.email_autoreply.length) &&
          (row.autoreply_start.length) &&
          (row.autoreply_end.length)
        ){
          return `<i  class="nf nf-fa-chevron_down" style="color: green"></i>`
        }
        else{
          return `<i class="nf nf-fa-ban" style="color: red"></i>`
        }
      },
      //TODO
      //in case replay in popup
      /*buttonAutoreply(row){
        // console.log(row.email_autoreply)
        if ( (row.email_autoreply.length) &&
          (row.autoreply_start.length) &&
          (row.autoreply_end.length)
        ){
          return [{
            text: bbn._("Auto reply"),
            action: (row)=>{this.autoreply_config(row)},
            notext: true,
            class:"bbn-green",
            icon: 'nf nf-fa-calculatorfa_send',
          }];
        }
        else{
           return [{
            text: bbn._("Write auto reply"),
            action: (row)=>{this.autoreply_config(row)},
            notext: true,
            class:"bbn-red",
            icon:'nf nf-fa-pencil_square',
          }];
        }
      },*/
      /*autoreply_config(row){
        this.getPopup().open({
          height: '40%',
          width: '70%',
          title: bbn._("Config Autoreply email"),
          component: 'appui-server-popup-domains-autoreply_message',
          source: row,
        });
      },*/
      //for button usersTable
      editUser(row, col, idx){
        row.root = this.source.root;
        row.server = this.source.server;
        row.domain = this.source.domain;
        return this.$refs.usersTable.edit(row, {
          title: bbn._('Modify user') + ' ' + row.user,
          height: '70%',
          width: '30%',
          onClose: () =>{
            this.$refs.usersTable.updateData();
          }
        }, idx)
      },
      deleteUser(row){
        this.confirm(bbn._("Are you sure you want to delete the user") + " " + row.user  + " " + bbn._("?"), ()=>{
          this.post(this.source.root + 'actions/domains/tab_users/delete_user', {
              server: this.source.server,
              domain: this.source.domain,
              user: row.user
            }, d => {
            if ( d.success ){
              this.$refs.usersTable.updateData();
              appui.success(bbn._('Deleted') + ' ' + row.user );
            }
            else {
              appui.error(bbn._("Error"));
            }
          });
        });
      },
    },
    created(){
      users = this.source;
      dataUser = this;
      /*let mixins = [{
        data(){
          return dataUser.source;
        }
      }];
      bbn.cp.setComponentRule(this.source.root + 'components', 'appui-server');
      bbn.cp.addComponent('popup/domains/user/add');
      bbn.cp.addComponent('popup/domains/user/edit');
      bbn.cp.addComponent('popup/domains/user/autoreply', mixins);
      bbn.cp.unsetComponentRule();*/
      //for add in menu of the tab delete cache
      this.closest("bbn-container").addMenu({
        text: bbn._("Delete cache"),
        icon: "nf nf-fa-trash_alt_alt",
        action:()=>{
          this.post(this.source.root + 'actions/domains/delete_cache',{
            server: this.source.server,
            domain: this.source.domain,
            tab: "users"
          }, d => {
            if ( d.success ){
              appui.success(bbn._("Delete"));
              this.$refs.usersTable.updateData();
            }
          });
        }
      });
    },
    components: {
      'newUser':{
        template:`<bbn-button @click="addUser" :title="title" icon="nf nf-fa-user_plus"></bbn-button>`,
        data(){
          return {
            title : bbn._('new user')
          }
        },
        methods:{
          addUser(){
            this.getPopup().open({
              height: '70%',
              width: '50%',
              title: bbn._("Add new user"),
              component: 'appui-server-popup-domains-user-add',
              source: users,
              onClose: () =>{
                this.closest('bbn-table').updateData()
              }
            });
          }
        }
      }
    }
  }
})();
