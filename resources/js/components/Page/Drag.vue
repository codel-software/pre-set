<template>
<div>
    <div class="row">
        <div class="col-2 ">
            <div id="navbar" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    NavBar 
                </div>
            </div>
            
            <div id="image" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Imagens 
                </div>
            </div>

            <div id="contatos" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Contatos
                </div>
            </div>

            <div id="info" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Info 
                </div>
            </div>

            <div id="cards" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Cards 
                </div>
            </div>

            <div id="label" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Titulo 
                </div>
            </div>

            <div id="banner" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Banner 
                </div>
            </div>

            <div id="carro-banner2" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Carrossel Banner 2
                </div>
            </div>

            

             <div id="text" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Texto 
                </div>
            </div>
            
            <div id="contato" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Entre em contato 
                </div>
            </div>

            <div id="rodape" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Rodapé 
                </div>
            </div>

            <div id="painel" class="card iten" draggable="true"   @dragstart="dragstart"> 
                <div class="card-body" > 
                    Painel 
                </div>
            </div>

             
            

        </div>
        <div class="col-10">
            <div  @dragover.prevent @drop.stop.prevent="drop" class="drop" >
                <br>
                <div v-for="l in list"  >
                    <cms-label class="item-site" v-if="l.type == 'label'" :content.sync="l" :editable="true"></cms-label>
                    <cms-text class="item-site" v-if="l.type == 'text'" :content.sync="l" :editable="true"></cms-text>
                    <cms-rodape class="item-site" v-if="l.type == 'rodape'" :content.sync="l" :editable="true"></cms-rodape>
                    <cms-contato class="item-site" v-if="l.type == 'contato'" :content.sync="l" :editable="true"></cms-contato>
                    <cms-contatos class="item-site" v-if="l.type == 'contatos'" :content.sync="l" :editable="true"></cms-contatos>

                    <cms-navbar class="item-site" v-if="l.type == 'navbar'" :content.sync="l" :editable="true"></cms-navbar>

                    <cms-painel class="item-site" v-if="l.type == 'painel'" :content.sync="l" :editable="true"></cms-painel>
                    <cms-cards class="item-site" v-if="l.type == 'cards'" :content.sync="l" :editable="true"></cms-cards>
                    <cms-info class="item-site" v-if="l.type == 'info'" :content.sync="l" :editable="true"></cms-info>
                    <cms-image class="item-site" v-if="l.type == 'image'" :content.sync="l" :editable="true"></cms-image>

                    <cms-banner class="item-site" v-if="l.type == 'banner'" :content.sync="l" :editable="true"></cms-banner>
                    <cms-carro-banner2 class="item-site" v-if="l.type == 'carro-banner2'" :content.sync="l" :editable="true"></cms-carro-banner2>
                
                </div>
                <br>
                <br>
        <div class="row">
            <div class="col-8 ">
            </div>
            <div class="col-4">
                <button v-show="is_home != 1" class=" btn btn-primary" @click="setHome" > Definir como Home</button>
                
                <button class=" btn btn-success" @click="save" > Salvar</button> 
            </div>
        </div>
            </div>
        </div>
    </div> 
    
</div>
</template>

<style scoped>
.drop{
    border: 1px solid #222;
     border-style: dashed;
}

.iten{
    cursor: move;
}
.item-site{

}

</style>
<script>
    export default {
        props: ['pageId'],
        data: function () {
          return {
              list: [],
              is_home: null
          }
        },
        mounted() {
                
            this.get();
            console.log(this.pageId);
            
        },
        methods:{
            setHome() {
                this.save();
                let local = this;
                axios.get('/api/cms/page/set-home/' + this.pageId)
                .then( function(response){
                    local.iNot();
                }).catch(function(){
                    local.iNot();
                });
                
               
                
            },
            get(){
                let local = this;

                axios.get('/api/cms/' + this.pageId)
                .then( function(response){

                    let config = response.data.config;
                    local.is_home = response.data.is_home;
                    
                    if(config == null){
                        local.list = [];
                    }else{
                        local.list = config;
                        
                    }
                    
                    this.$forceUpdate();

                }).catch(function(){
                    console.log("ERRO AXIOS 2")
                });
            },
            save(){

                let local =  this;

                let data = {
                    config: this.list
                };
                
                axios.post('/api/cms/update/' + this.pageId, data)
                .then( function(response){
                   local.sNot();

                }).catch(function(){
                    
                });

            },
            sNot(){
                this.$toaster.success('Salvo com Sucesso')
            },
            iNot(){
                this.$toaster.success('Definido como Home')
            },
            dragstart(event) {
               
                //crt.style.backgroundColor = "red";
                event.dataTransfer.setData("selectedIdx", event.target.id);
            },
            drop: function(event){
                event.preventDefault();
                console.log(event)
                let type = event.dataTransfer.getData("selectedIdx");

                let id =  this.list.length + 1;
                let elemet = { 
                                id: id,
                                type: type,
                                title: "Titulo"
                            };
                this.list.push(elemet);

                event.dataTransfer.setData("selectedIdx", null);

            },
             allowDrop: function(event){
                event.preventDefault();

            }
        }
    }
</script>
