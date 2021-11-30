<template>
<div>
    <div v-for="usuario in usuarios">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        Nome: {{usuario.name}} <br>
                        E-mail: {{usuario.email}} <br>
                        Tipo: {{usuario.type}}
                    </div>
                    <div class="col-4">

                        <button v-if = "usuario.email != 'admin@admin.com'" v-on:click="deleteU(usuario.id)" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button><br>
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
            usuarios: ''
          }
        },
        methods: {
            deleteU(id){
                let local = this;
                axios.get('/api/DeleteU/'+id)
                .then(function(){
                    local.dNot();
                })
            },
            dNot(){
                this.$toaster.error('Deletado')
                window.location.reload();
            },
        },
        mounted() {
            let local = this;
            axios.get('/api/getUsuarios').then(function(response){
               local.usuarios = response.data;
               this.modulos();
            })

        }
    }
</script>
