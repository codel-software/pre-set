<template>
<div class="card">
<div class="card-body">
    

    
     <h1>Dashboard</h1>
     <br>
     <div class="media">
        <div class="avatar bg-light-primary rounded mr-1">
            <div class="avatar-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar avatar-icon font-medium-3"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </div>
        </div>
        <div class="media-body">
            <h6 class="mb-0">{{dados.date}}</h6>
            <small>{{dados.hora}}</small>
        </div>
    </div>
    <div>
        <div class="col-12">
        <div class="card card-statistics">
            <div class="card-header">
            <h4 class="card-title">Estatisticas</h4>
            <div class="d-flex align-items-center">
                
            </div>
            </div>
            <div class="card-body statistics-body">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                <div class="media">
                    <div class="avatar bg-light-primary mr-2">
                    <div class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    </div>
                    </div>
                    <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-0">{{dados.transacoes}}</h4>
                    <p class="card-text font-small-3 mb-0">Transações</p>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                <div class="media">
                    <div class="avatar bg-light-info mr-2">
                    <div class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user avatar-icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                    </div>
                    <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-0">{{dados.usuarios}}</h4>
                    <p class="card-text font-small-3 mb-0">Usuários</p>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                <div class="media">
                    <div class="avatar bg-light-danger mr-2">
                    <div class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    </div>
                    </div>
                    <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-0">{{dados.categorias}}</h4>
                    <p class="card-text font-small-3 mb-0">Categorias</p>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                <div class="media">
                    <div class="avatar bg-light-success mr-2">
                    <div class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    </div>
                    </div>
                    <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-0">
                        {{$formatMoney(dados.valor)}}
                    </h4>
                    
                    <p class="card-text font-small-3 mb-0">Saldo</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        
    </div>
    
    
</div>
</div>
</template>

<script>
    export default {
        props:['value'],
        data: function () {
          return {
             dados: ''
          }
        },
        methods: {
            dados(){
                let local = this;
                axios.get('/api/dados').then(function(response){
                    local.dados = response.data;
                    console.log(local.dados)
                });
            },
            alo(){
                console.log('alo');
            }
        },
        mounted() {
            let local = this;
                axios.get('/api/dados').then(function(response){
                    local.dados = response.data;
                    console.log(local.dados)
                });
            
        }

    }
</script>
