<template>
    <div v-if="content.id != null" class="row">
    	<div class="col-md-1 col-sm-3"></div>

		<div class="col-md-10 col-sm-6">
		<div class="card">
			<div class="card-body ">
				<div :id="'carousel-example-caption'+content.id" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
					<li :data-target="'#carousel-example-caption'+content.id" data-slide-to="0" class=""></li>
					<li :data-target="'#carousel-example-caption'+content.id" data-slide-to="1" class="active"></li>
					<li :data-target="'#carousel-example-caption'+content.id" data-slide-to="2" class=""></li>
					</ol>
					<div class="carousel-inner" role="listbox">
					<div class="carousel-item active carousel-item-left">
						<div class="row"> 
							<div class="col-9"> 
								<img class="img-fluid" :src="(content.url1 == null ? '/app-assets/images/slider/08.jpg':content.url1)" alt="First slide">
							</div>
							<div class="col-3"> 
								<h3 class="">{{ content.title1}}</h3>
								<p class="">{{content.descricao1}}</p>
							</div>
						</div>
					</div>
					<div class="carousel-item carousel-item-next carousel-item-left">
						<div class="row"> 
							<div class="col-9"> 
								<img class="img-fluid" :src="(content.url1 == null ? '/app-assets/images/slider/08.jpg':content.url2)" alt="First slide">
							</div>
							<div class="col-3"> 
								<h3 class="">{{ content.title2}}</h3>
								<p class="">{{content.descricao2}}</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row"> 
							<div class="col-9"> 
								<img class="img-fluid" :src="(content.url1 == null ? '/app-assets/images/slider/08.jpg':content.url3)" alt="First slide">
							</div>
							<div class="col-3"> 
								<h3 class="">{{ content.title3}}</h3>
								<p class="">{{content.descricao3}}</p>
							</div>
						</div>
					</div>
					</div>
					<a class="carousel-control-prev " :href="'#carousel-example-caption'+content.id" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" :href="'#carousel-example-caption'+content.id" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
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
							<label>Image 1: </label>
							<input-file :url.sync="content.url1" ></input-file>
							
							<div class="form-group">
								<input type="text" v-model="content.title1" class="form-control" />
							</div>
							<div class="form-group">
								<input type="text" v-model="content.descricao1" class="form-control" />
							</div>

							<hr />

							<label>Image 2: </label>
							<input-file :url.sync="content.url2" ></input-file>
							
							<div class="form-group">
								<input type="text" v-model="content.title2" class="form-control" />
							</div>
							<div class="form-group">
								<input type="text" v-model="content.descricao2" class="form-control" />
							</div>

							<hr />

							<label>Image 3: </label>
							<input-file :url.sync="content.url3" ></input-file>
							
							<div class="form-group">
								<input type="text" v-model="content.title3" class="form-control" />
							</div>
							<div class="form-group">
								<input type="text" v-model="content.descricao3" class="form-control" />
							</div>

							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
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
import inputFile from '../InputFile.vue'
export default {
  components: { inputFile },
        props:{
			editable: {default: false},
			content: {default: {}},
		},
        data: function () {
          return {
              categoria_id: '',
              eventos: ''
          }
        },
        methods: {
            
        },
        mounted() {


        }
    }
</script>
