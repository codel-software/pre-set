<template>
    <div>
        <label>Nome</label>
        <input v-model="name" class="form-control" type="text">

        <label>E-mail</label>
        <input v-model="email" class="form-control" type="email">

        <label>Senha</label>
        <input v-model="password" class="form-control" type="password"> 

        <label>Tipo</label>
        <select v-model="type" class="form-control" name="" id="">
            <option value="2">Administrador</option>
            <option value="3">Normal</option>
        </select><br>

        <button v-on:click="Salvar()" class="btn btn-primary"> Criar</button>

    </div>
</template>

<script>
    export default {
        
        data: function () {
          return {
             email: '',
             password: '',
             name: '',
             type: ''
          }
        },
        methods: {
            Salvar(){

                
                let local = this;
                axios.post('/api/register', {
                    email: local.email,
                    password: local.password,
                    name: local.name,
                    type: local.type
                }).then(function(response){
                local.sNot();
                }).catch(function(error){
                    if (error.response){
                        local.eNot();
                    }
                });
               
            },
            sNot(){
                this.$toaster.success('Usuario Criado')
                window.location.reload();
            },
            eNot(){
                this.$toaster.error('Preencha os campos corretamente')
            },
            dNot(){
                this.$toaster.error('E-mail ja cadastrado')
            },
        },
        mounted() {
        

        }
    }
</script>
