<template>
    <div class="card">
        <div class="card-body">
                <div class="">

                    <div class="form-group">
                        <h4>Insira o e-mail cadastrado para recuperar sua senha</h4>
                        <input v-model="email"   class="form-control"  name="email" type="text" placeholder="E-mail"><br>
                    </div>

                    {{token}}
                    
                    <button @click="enviar" class="btn btn-success btn-lg btn-block">Enviar</button>
                </div>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
          return {
              email: null,
              token: null,
              user: null,
          }
        },
        methods:{
            enviar(){
                let local = this;

                axios.post('', { email: this.email})
                .then(function(response){
                    
                })
                .catch(function (error) {
                    console.log(error);
                })
            },
        },
        mounted() {
           

        }
    }
</script>