<template>
    <div v-if="content.id != null" class="row mb-sm-3">
    	<div class="col-md-1 col-sm-3"></div>
		<div class="col-md-10 col-sm-6">
			<div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"> 
                    <a :href="content.url">
                        <button class="btn">
                            <img src="https://logodownload.org/wp-content/uploads/2015/04/whatsapp-logo-1.png">
                        </button>
                    </a>
                </div>
                <div class="col-md-2"></div>                
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>

            </div>
		</div>
		<div class="col-md-1 col-sm-3">
			<div v-if="editable"> 
				<!-- Button trigger modal -->
				<button @click="content.id = null" type="button" class="btn btn-outline-danger mb-50">
					Remover
				</button>
				<button type="button" class="btn btn-outline-primary mb-50" data-toggle="modal" :data-target="'#inlineForm' + content.id">
					Editar
				</button>
				<!-- Modal -->
				<div
					class="modal fade text-left"
					:id="'inlineForm' + content.id"
					tabindex="-1"
					role="dialog"
					aria-labelledby="myModalLabel33"
					aria-hidden="true"
				>
					<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel33">Editar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<form action="#">
						<div class="modal-body">
							<label>Contatos: </label>
							<div class="form-group">
							<input placeholder="Link do Whatsapp" type="text" v-model="content.url" class="form-control" />
							</div>

							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
						</div>
						</form>
					</div>
					</div>
				</div>
			</div>
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
			editable: {default: false},
			content: {default: {}},
		},
        data: function () {
          return {
          }
        },
        methods: {
            
        },
        mounted() {

        }
    }
</script>
