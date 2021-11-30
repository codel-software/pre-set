<template>
    <div v-if="content.id != null" class="row mb-sm-3">
    	<div class="col-md-1 col-sm-3"></div>
		<div class="col-md-10 col-sm-6">
			<section class="pt-3 pb-4" id="count-stats">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mx-auto py-3">
        <div class="row">
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary"><span id="state1" :countto="content.n1">{{content.n1}}</span>+</h1>
              <h5 class="mt-3">Coded Elements</h5>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary"> <span id="state2" :countto="content.n2">{{content.n2}}</span>+</h1>
              <h5 class="mt-3">Design Blocks</h5>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary" id="state3" :countto="content.n3"><span id="state2" :countto="content.n2">{{content.n3}}</span>+</h1>
              <h5 class="mt-3">Pages</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
			
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
							<label>Texto 1: </label>
							<div class="form-group">
								<input type="text" class="form-control" />
							<label>Valor 1: </label>
								<input type="number" class="form-control" />
							</div>
							<label>Texto 2: </label>
							<div class="form-group">
								<input type="text" class="form-control" />
								<label>Valor 2: </label>
								<input type="number" class="form-control" />
							</div>

							<label>Texto 3: </label>
							<div class="form-group">
								<input type="text" class="form-control" />
								<label>Valor 3: </label>
								<input type="number" class="form-control" />
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
