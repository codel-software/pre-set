<template>
    <div v-if="content.id != null" class="row mb-sm-3">
    	<div class="col-md-0 col-sm-3"></div>
		<div class="col-md-10 col-sm-6">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav">
          <li class="nav-item px-2">
            <img style="margin-left: 0px" height="15" src="/img/logo.png">
          </li>
        </ul>
      </div>
    <div class="collapse navbar-collapse mx-5" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" :href="id1">
                    {{content.link1}}
                </a>
               
            </li>
            <li class="nav-item active">
                <a class="nav-link" :href="id2">
                    {{content.link2}}
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" :href="id3">
                    {{content.link3}}
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" :href="id4">
                    {{content.link4}}
                </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a href="/login" class="btn btn-link waves-effect waves-float waves-light">
              Logar
            </a>
        </form>
    </div>
</nav>
		
		</div>
		<div class="col-md-2 col-sm-3">
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
							<label>Logo </label>
							<form>
                                <div class="form-group">
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <label>Home</label>
                                    <input type="text" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <label>Menu 1</label>
                                    <input type="text" v-model="content.link1" class="form-control-file" id="exampleFormControlFile1">
                      
                                </div>
                                <div class="form-group">
                                    <label>Menu 2</label>
                                    <input type="text" v-model="content.link2" class="form-control-file" id="exampleFormControlFile1">
                                 
                                </div>
                                <div class="form-group">
                                    <label>Menu 3</label>
                                    <input type="text" v-model="content.link3" class="form-control-file" id="exampleFormControlFile1">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Menu 4</label>
                                    <input type="text" v-model="content.link4" class="form-control-file" id="exampleFormControlFile1">
                                   
                                </div>
                            </form>

							
						</div>
						<div class="modal-footer">
							<button type="button" @click="salvar" class="btn btn-primary" data-dismiss="modal">Ok</button>
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
              id1: '',
              id2: '',
              id3: '',
              id4: ''
          }
        },
        methods: {
            salvar(){
                localStorage.setItem('id1', this.id1);
                localStorage.setItem('id2', this.id2);
                localStorage.setItem('id3', this.id3);
                localStorage.setItem('id4', this.id4);
            }
        },
        mounted() {

        }
    }
</script>
