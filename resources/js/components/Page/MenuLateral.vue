<template>
       <!-- BEGIN: Main Menu-->
    <div class="main-menu  menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="/html/ltr/vertical-collapsed-menu-template/index.html">
            <span class="brand-logo">
                <!--
                <img src="{{ env('URL_LOGO')}}" >
                -->
                LOGO
            </span>
            </a>
          </li>

          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div  v-if="user != null" class="main-menu-content">
        <ul  class="navigation navigation-main"  data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="/user/dashboard"> <i class="cil-home"></i> <span class="menu-title text-truncate" data-i18n="Email">Home</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="/user/dados"> <i data-feather='user'></i><span class="menu-title text-truncate">Meus Dados</span></a>
            </li>

            <li class=" navigation-header"><span data-i18n="Financeiro">Administrativo</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="/user/usuarios"><i data-feather='users'></i><span class="menu-title text-truncate">Usuarios</span></a>
            </li>

           

            <li v-show="user.type == 99"  class=" navigation-header"><span data-i18n="Financeiro">Adiministrador do Systema</span><i data-feather="more-horizontal"></i>
            </li>

            <li v-show="user.type == 99"  class=" nav-item"><a class="d-flex align-items-center" href="/user/modulos"><i class="cil-3d"></i><span class="menu-title text-truncate">Modulo</span></a>
            </li>
                
        </ul>

        <ul v-for="modulo in modulos" class="navigation navigation-main"  data-menu="menu-navigation">

               

             

          

     


           
             
            
        </ul>
    </div>
    </div>
    <!-- END: Main Menu-->
</template>
<script>
    export default {
        data: function () {
          return {
              modulos: [],
              user: null,
          }
        },
        mounted() {
          console.log("carregando menu")
          axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.token;

            let local = this;
                axios.get('/api/modulos/ativos', {})
                .then(function(response){
                    local.modulos = response.data;
                })

                axios.get('/api/user')
                .then(function(response){
                    local.user = response.data;
                })
        }
    }
</script>