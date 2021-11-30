<template>
    <ul class="nav navbar-nav bookmark-icons">
        <li v-for="link in list_menu" class="nav-item d-none d-lg-block">
            <a class="nav-link" :href="link.link">
                {{link.name}} 
            </a>
        </li>
    </ul>
</template>
<style scoped>
    a{
        font-size: 20px !important;
    }
</style>
<script>
    export default {
        
        data: function () {
          return {
              list_menu: [],
          }
        },
        methods: {
            
        },
        mounted() {
            let local = this;
            axios.get('/api/config/menu')
                .then(function(response){
                    local.list_menu = response.data.value;
                    local.$forceUpdate();
            });

        }
    }
</script>
