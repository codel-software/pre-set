<template>

<div>
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <h1>Paleta de cores</h1>

                    <label for="exampleColorInput" class="form-label">Cor Primaria</label> 
                    <input v-model="primary" type="color" class="form-control form-control-color" id="exampleColorInput" value="#6c757d" title="Choose your color">
        
                    <label for="exampleColorInput" class="form-label">Cor Secundaria</label>
                    <input v-model="secondary" type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">

                    <label for="exampleColorInput" class="form-label">Cor Terciaria</label>
                    <input v-model="success" type="color" class="form-control form-control-color" id="exampleColorInput" value="#38c172" title="Choose your color">

                    <label for="exampleColorInput" class="form-label">Cor Quaternaria</label>
                    <input v-model="info" type="color" class="form-control form-control-color" id="exampleColorInput" value="#6cb2eb" title="Choose your color">
                    <label for="exampleColorInput" class="form-label">Cor Quinaria</label>
                    <input v-model="warning" type="color" class="form-control form-control-color" id="exampleColorInput" value="#ffed4a" title="Choose your color">
                    <label for="exampleColorInput" class="form-label">Cor Senario</label>
                    <input v-model="danger" type="color" class="form-control form-control-color" id="exampleColorInput" value="#e3342f" title="Choose your color">
                    <label for="exampleColorInput" class="form-label">Cor Setenario</label> 
                    <input v-model="light" type="color" class="form-control form-control-color" id="exampleColorInput" value="#f8f9fa" title="Choose your color">
                </div>
            </div>
        </div>
        <div class="col-3">
            <button v-on:click="salvar()" class="btn btn-primary"> Salvar</button>
        </div>
    </div>
     <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <h3>Editar menu</h3>

                    <div v-for="link in list_menu">
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Nome</label>
                                <input class="form-control" v-model="link.name" />
                            </div>
                            <div class="col-6">
                                <label>Link</label>
                                <input class="form-control" v-model="link.link" />
                            </div>
                        </div>
                    </div>
                    <br>

                    <button class="btn btn-primary" @click="add()">Adicionar</button>

                </div>
            </div>
            
        </div>
        <div class="col-3">
            <button class="btn btn-primary" @click="salvarMenu()">Salvar</button>
        </div>
    </div>
</div>



</template>

<script>
    export default {
        
        data: function () {
          return {
            list_menu : [],
            primary: '',
            secondary: '#6c757d',
            success: '#38c172',
            info: '#6cb2eb',
            warning: '#ffed4a',
            danger: '#e3342f',
            light: '#f8f9fa'
          }
        },
        methods: {
            add(){
                this.list_menu.push({ name: "novo", link: "" });
            },
            remove(){
            },
            salvarMenu(){
                let local = this;
                axios.post('/api/config/set', {
                    name: "menu",
                    value: this.list_menu
                }).then(function(response){
                    local.sNot();
                })
            },
            getMenu(){
                let local = this;
                axios.get('/api/config/menu').then(function(response){
                    console.log(response.data);
                    local.list_menu = response.data.value;
                })
            },
            salvar(){
               let local = this;
               axios.post('/api/salvarTema', {
                   'primary' : local.primary,
                   'secondary' : local.secondary,
                   'success' : local.success,
                   'info' : local.info,
                   'warning' : local.warning,
                   'danger' : local.danger,
                   'light' : local.light,
               }).then(function(response){
                    local.sNot();
               });
           },
           sNot(){
                this.$toaster.success('Salvo')
            },
        },
        mounted() {
            this.type = localStorage.getItem('type');
            let local = this;
            axios.get('/api/tema').then(function(response){
                local.primary = response.data.primary,
                local.secondary = response.data.secondary
                local.success = response.data.success
                local.info = response.data.info
                local.warning = response.data.warning
                local.danger = response.data.danger
                local.light = response.data.light
                
            });

            this.getMenu();
        }
    }
</script>
