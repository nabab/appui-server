(()=>{
  return{
    created(){
      this.post('server/data/cloudmin/commands',{}, d =>{
        let cmds = [],
            obj = {};
        if ( d.commands !== undefined ){
          bbn.fn.each(d.commands, (val, i) =>{
            obj = {
              'command': i,
              'description': val[0],
            };
            obj.props= val;
            cmds.push(obj);
          });
          this.commands = cmds
        }
      })
    },
    data(){
      return {
        commands: [],
        searchContent: [],
        search: false,
      }
    },
    computed:{
      sourceTable(){
        if ( this.searchContent.length && (this.search === true) ){
          return this.searchContent;
        }
        else if ( this.search === false ){
          return this.commands;
        }
        else {
          return [];
        }

      }
    },
    methods:{
      renderDescription(row){
        let info = bbn.fn.extend({}, row.description);

        if ( info.value !== undefined  ){
           return info.value;
        }
        else{
         return '-';
        }
      }
    },
    watch:{
      sourceTable(val){
        if ( val && this.search ){
          this.$nextTick(()=>{
            this.$refs.table.updateData()
          });
        }
      }
    },
    components: {
      'cmd':{
        template: `
          <div v-if="props">
            <bbn-table :source="props"
                       :sortable="true"
                       :order="[{field: 'parameter', dir: 'ASC'}]"
                       :scrollable="false"
            >
              <bbns-column title="${bbn._('Parameter')}"
                           field='name'
                           cls='bbn-b bbn-c'
              ></bbns-column>
              <bbns-column title="${bbn._('Values')}"
                           field='values'
              ></bbns-column>
            </bbn-table>
          </div>`,
        props: ['source'],
        data(){
          return {
            props:[]
          }
        },
        created(){
          let arr = this.source.props.slice();
          arr.shift();
          this.props = arr;
        }
      },
      'search':{
        template: `
          <div class="toolbar">
            <div style="float: right">
              <i class="nf nf-fa-search" style="margin: 0 5px"></i>
              <bbn-input style="width: 300px"
                         placeholder="${bbn._('Search command')}"
                         v-model="searchCommand"
              ></bbn-input>
            </div>
          </div>`,
        data(){
          return {
            commands: this.closest("bbn-container").getComponent(),
            searchCommand: ''
          }
        },
        methods:{
          searchingCommand(ele){
            let name = '';
            this.commands.searchContent = [];
            for(let cmd of this.commands.commands){
              name = cmd.command.toLowerCase();
              if ( name.indexOf(ele.toLowerCase()) > 0 ){
                this.commands.searchContent.push(cmd);
              }
            }
            this.commands.search = true;
          }
        },
        watch:{
          searchCommand(val){
            if( val.length ){            
              this.searchingCommand(val);
            }
            else{
              this.commands.search = false;
            }
          }
        }
      },

    }
  }
})();
