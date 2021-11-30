<template>
<div>
    <input type="file"  class="" @change="salvar($event)" />
</div>
</template>

<script>
    export default {
        props:['url'],
        data: function () {
          return {
            file: null,          
          }
        },
        methods: {
            salvar(event){
                let local = this;

                this.file = event.target.files[0];

                console.log(this.file);

                let formData = new FormData();

                formData.append('file', this.file);

                axios.post( '/api/cms/uploadFile',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
                ).then(function(response){
                    local.url = response.data.url;
                    local.$emit('update:url', local.url)
                    console.log('SUCCESS!!');
                })
                .catch(function(){
                    console.log('FAILURE!!');
                });
                },
            
        },
        mounted() {

            

           
        }
    }
</script>
