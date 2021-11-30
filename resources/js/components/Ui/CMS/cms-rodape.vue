<template>
    <div :id="content.id1" v-if="content.id != null" class="row mb-sm-3">
    	<div class="col-md-1 col-sm-3"></div>
		<div class="col-md-10 col-sm-6">
			<footer class="footer text-center">
           
                <div class="row">
                    <div class="col-4">
                        <h4 class="text-uppercase mb-4">Local</h4>
                        <p class="lead mb-0">
                            {{content.local}}
                        </p>
                        </div>
                    <div class="col-4"> 
                        <h4 class="text-uppercase mb-4">Contatos</h4>
                           <a :href="content.whatsapp"><button type="button" class="btn rounded-circle"><i class="fab fa-facebook-square fa-2x"></i></button></a>
                           <a :href="content.linkedin"><button type="button" class="btn rounded-circle"><i class="fab fa-linkedin fa-2x"></i></button></a>
                           <a :href="content.facebook"><button type="button" class="btn rounded-circle"><i class="fab fa-whatsapp fa-2x"></i></button></a>

                    </div>


                    <div class="col-4"> 
                        <h4 class="text-uppercase mb-4">Sobre</h4>
                        <p class="lead mb-0">
                            {{content.about}}                            
                        </p>
                    </div>
                    
                </div>
           
            </footer>
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
							<label>Local: </label>
							<div class="form-group">
							    <input type="text" v-model="content.local" class="form-control" />
							</div>

                            <label>Contatos: </label>
							<div class="form-group">
                              <label>Whatsapp</label> <i class="far fa-eye-slash"></i><input type="text" v-model="content.whatsapp" class="form-control" /> 
                              <label>Linkedin</label> <i class="far fa-eye-slash"></i><input type="text" v-model="content.linkedin" class="form-control" /> 
                              <label>Facebook</label> <i class="far fa-eye-slash"></i><input type="text" v-model="content.facebook" class="form-control" /> 
                            </div>

                            <label>Sobre: </label>
							<div class="form-group">
							    <input type="text" v-model="content.about" class="form-control" />
							</div>

							<label>Identificador: </label>
							<div class="form-group">
							    <input v-model="content.id1" class="form-control" />
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
