<template>
    
        <button @click="deleteP(value)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
    
</template>

<script>
    export default {
       props:['value'],
        methods:{
            deleteP(value){
                let local =  this;

                axios.get('/api/page/delete/'+value)
                    .then(function(response){
                        local.sNot();
                    })
            },
            sNot(){
                this.$toaster.success('Deletado')
                window.location.reload();
            },            
        },
        mounted() {
            
        }
    }
</script>
