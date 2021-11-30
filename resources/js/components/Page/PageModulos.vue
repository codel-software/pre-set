<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Modulos </h1> 
                <button @click="update" class="btn btn-success"  > Salvar </button>

                <br>
                <button @click="addFinanceiro" class="btn btn-info" v-if="! checkModule(1)" > Financeiro </button>
                <button @click="addCrm" class="btn btn-info" v-if="! checkModule(2)" > CRM </button>
                <button @click="addCms" class="btn btn-info" v-if="! checkModule(3)" > CMS </button>
                <br>
                <br>

                <div v-for="modulo in modulos" class="card">
                    <div v-if="modulo.module_id == 1" class="card-body">
                        Financeiro <toggle-button :labels="{checked: 'On', unchecked: 'Off'}" :value="Boolean(modulo.status)"  @change="onToggleChange(modulo, $event)"/>
                        
                        <div v-if="modulo.status">
                            <v-jsoneditor v-model="modulo.value" :options="{ mode: 'code' }" :plus="true"  />
                        </div>
                    </div>

                    <div v-if="modulo.module_id == 2" class="card-body">
                        CRM <toggle-button :labels="{checked: 'On', unchecked: 'Off'}" :value="Boolean(modulo.status)"  @change="onToggleChange(modulo, $event)"/>
                        
                        <div v-if="modulo.status">
                            <v-jsoneditor v-model="modulo.value" :options="{ mode: 'code' }" :plus="true"  />
                        </div>
                    </div>

                    <div v-if="modulo.module_id == 3" class="card-body">
                        CMS <toggle-button :labels="{checked: 'On', unchecked: 'Off'}" :value="Boolean(modulo.status)"  @change="onToggleChange(modulo, $event)"/>
                        
                        <div v-if="modulo.status">
                            <v-jsoneditor v-model="modulo.value" :options="{ mode: 'code' }" :plus="true"  />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
         data: function () {
          return {
              modulos: [],
          }
        },
        mounted() {
            axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.token;

            let local = this;
                axios.get('/api/modulos/ativos', {})
                .then(function(response){
                    local.modulos = response.data;           
                })
        },
         methods: {
            update(){
               axios.post('/api/modulos/update/all', this.modulos)
                .then(function(response){
                    location.reload();
                })
            },
            checkModule(type){
                let modulo = this.modulos.find(modulo => modulo.module_id == type);

                if(modulo == undefined){
                    return false;
                }

                return true;
            },
            onToggleChange(modulo, event) { 
                if(event.value){
                    modulo.status = 1;
                }else{
                    modulo.status = 0;
                }
            },
            addFinanceiro() { 
                 axios.get('/api/modulos/financeiro/ativar', {})
                .then(function(response){
                    location.reload();
                })
            },
            addCms() { 
                 axios.get('/api/modulos/cms/ativar', {})
                .then(function(response){
                    location.reload();
                })
            },
            addCrm() { 
                 axios.get('/api/modulos/crm/ativar', {})
                .then(function(response){
                    location.reload();
                })
            },
        }
    }
</script>
