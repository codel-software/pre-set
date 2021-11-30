<template>
    <div class="card">
        <div class="card-body">
                <div class="">

                    <div class="form-group">
                        <label>E-mail</label>
                        <input v-model="email"   class="form-control"  name="email" type="text"><br>
                    </div>
                    
                    <div class="form-group">
                        <label>Senha</label>
                        <input v-model="password"  class="form-control"  name="password" type="password">
                        <a href="/forgotpassword" class="">Esqueci minha senha</a>
                    </div><br>
                    

                    {{token}}
                    
                    <button @click="login" class="btn btn-success btn-lg btn-block">Entrar</button>
                </div>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
          return {
              email: null,
              password: null,
              token: null,
              user: null,
          }
        },
        methods:{
            login(){
                let local = this;

                axios.post('/api/user/login', { email: this.email, password: this.password })
                .then(function(response){
                    local.user = response.data.user;
                    localStorage.setItem('token', response.data.token)
                    window.location.href = "/user/dashboard";
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