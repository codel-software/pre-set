<template>
    <div v-if="content.id != null" class="row mb-sm-3">
    	<div class="col-md-1 col-sm-3"></div>
		<div class="col-md-10 col-sm-6">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                     <img
                            :src="(content.url == null ? 'https://mdbootstrap.com/img/new/standard/nature/184.jpg':content.url)"
                            class="card-img-top"
                            alt="..."
                        />

                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{content.t}}</h5>
                        <p class="card-text">{{content.d}}</p>
                    </div>
                    </div>
                </div>
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
							<label>Info</label>
                            <div class="card-body">
                                <div class="form-group">

                                    <input type="text" v-model="content.t" class="form-control" placeholder="Titulo"/> <br>
                                    <input type="text" v-model="content.d" class="form-control" placeholder="Descrição"/><br>
                                    
                                    <input-file :url.sync="content.url" ></input-file>
                
                                </div>
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
