<template>
	<div>
		<div v-for="l in list"  >
			<cms-label  v-if="l.type == 'label'"  :content="l"  ></cms-label>
            <cms-text v-if="l.type == 'text'" :content="l" ></cms-text>
            <cms-rodape v-if="l.type == 'rodape'" :content="l" ></cms-rodape>
            <cms-contato v-if="l.type == 'contato'" :content="l" ></cms-contato>
            <cms-contatos  v-if="l.type == 'contatos'" :content="l" ></cms-contatos>

            <cms-navbar v-if="l.type == 'navbar'" :content="l" ></cms-navbar>
            <cms-painel v-if="l.type == 'painel'" :content="l" ></cms-painel>
            <cms-cards v-if="l.type == 'cards'" :content="l" ></cms-cards>
            <cms-info v-if="l.type == 'info'" :content="l" ></cms-info>
            <cms-image v-if="l.type == 'image'" :content="l" ></cms-image>
            <cms-banner v-if="l.type == 'banner'" :content="l" ></cms-banner>
            <cms-carro-banner2  v-if="l.type == 'carro-banner2'" :content="l" ></cms-carro-banner2>

		</div>
	</div>    
</template>
<style scoped>
img 
{
   width: 100%;
   height: auto;
}

</style>
<script>
    export default {
        props:{
			isHome: {default: false},
			id: {default: 0},
		},
        data: function () {
          return {
			  list:[],
          }
        },
        methods: {
            
        },
        mounted() {
			let local =  this;
			if(this.isHome){
				axios.get('/api/cms/page/get-home')
                .then( function(response){
					let config = response.data.config;

                    if(config == null){
                        local.list = [];
                    }else{
                        local.list = config;
                    }
                    
                    this.$forceUpdate();
                }).catch(function(){
                    console.log("ERRO AXIOS")
                });
			}else{
                axios.get('/api/cms/'+this.id)
                .then( function(response){
					let config = response.data.config;

                    if(config == null){
                        local.list = [];
                    }else{
                        local.list = config;
                    }
                    
                    this.$forceUpdate();
                }).catch(function(){
                    console.log("ERRO AXIOS")
                });
            }
        }
    }
</script>
