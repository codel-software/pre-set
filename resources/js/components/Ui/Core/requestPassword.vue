<template>
    <div class="card">
        <div class="card-body">
                <div class="">

                    <div class="form-group">
                        <span>Nova senha</span>
                        <input v-model="password"   class="form-control"  name="password" type="password" placeholder=""><br>
                        <span>Confirmar nova senha</span>
                        <input v-model="passwordC"   class="form-control"  name="password" type="password" placeholder=""><br>
                    </div>

                    {{token}}
                    
                    <button v-if="password == passwordC" @click="enviar" class="btn btn-success btn-lg btn-block ">Salvar</button>
                    <button v-else @click="enviar" class="btn btn-danger btn-lg btn-block disabled">As senhas devem coincidir</button>

                </div>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
          return {
              password: '',
              passwordC: null,
            
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