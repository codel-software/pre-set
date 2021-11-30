<template>
    <div v-if="content.id != null" class="row mb-sm-3">
    	<div class="col-md-1 col-sm-3"></div>
		<div class="col-md-10 col-sm-6">

            <div class="row">
                <div class="col-4">
                    <div v-if="content.v1 == 1" class="card">
                        <img
                            :src="(content.card1 == null ? 'https://mdbootstrap.com/img/new/standard/nature/184.jpg':content.card1)"
                            class="card-img-top"
                            alt="..."
                            id="format-img"
                        />
                       
                        <div class="card-body">
                            <h5 class="card-title">{{content.t1}}</h5> 
                            <p class="card-text">
                                {{content.desc1}}
                            </p>
                            
                            <a  data-toggle="modal" :data-target="'#inlineForm2' + content.id" class="btn btn-primary"><t class="white">Ver Mais</t></a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div v-if="content.v2 == 1" class="card">
                        <img
                            :src="(content.card2 == null ? 'https://mdbootstrap.com/img/new/standard/nature/184.jpg':content.card2)"
                            class="card-img-top"
                            alt="..."
                            id="format-img"
                        />
                       
                        <div class="card-body">
                            <h5 class="card-title">{{content.t2}}</h5> 
                            <p class="card-text">
                                {{content.desc2}}
                            </p>
                            
                            <a  data-toggle="modal" :data-target="'#inlineForm3' + content.id" class="btn btn-primary"><t class="white">Ver Mais</t></a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div v-if="content.v3 == 1" class="card">
                        <img
                            :src="(content.card3 == null ? 'https://mdbootstrap.com/img/new/standard/nature/184.jpg':content.card3)"
                            class="card-img-top"
                            alt="..."
                            id="format-img"
                        />
                       
                        <div class="card-body">
                            <h5 class="card-title">{{content.t3}}</h5> 
                            <p class="card-text">
                                {{content.desc3}}
                            </p>
                            
                            <a  data-toggle="modal" :data-target="'#inlineForm4' + content.id" class="btn btn-primary"><t class="white">Ver Mais</t></a>
                        </div>
                    </div>
                </div>
            </div>
		</div>




<div class="modal fade" :id="'inlineForm2' + content.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel33" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{content.t1}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="card-title">{{content.tv1}}</h5>
        <p class="card-text">
        <p class="card-text">
            <span v-if="content.h1 != null" class="badge badge-primary"><i class="cil-clock"></i> {{content.h1}} h</span>
        </p> 
        <p class="card-text">
            {{content.descv2}}
        </p>
        </p>
        <p class="card-text">
            {{content.descv1}}
        </p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" :id="'inlineForm3' + content.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{content.t2}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="card-title">{{content.tv2}}</h5>
        <p class="card-text">
            <span v-if="content.h2 != null" class="badge badge-primary"><i class="cil-clock"></i> {{content.h2}} h</span>
        </p> 
        <p class="card-text">
            {{content.descv2}}
        </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" :id="'inlineForm4' + content.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{content.t3}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="card-title">{{content.tv3}}</h5>
        <p class="card-text">
            <span v-if="content.h3 != null" class="badge badge-primary"><i class="cil-clock"></i> {{content.h3}} h</span>
        </p>
        <p class="card-text">
            {{content.descv3}}
        </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
							<label>Card 1 </label>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Visivel ?</label><br>
                                    <input v-model="content.v1" name="f" type="radio" value="1">
                                    <label >Sim</label><br>
                                    <input v-model="content.v1" name="f" type="radio" value="0">
                                    <label >Não</label><br>


                                    <input type="text" v-model="content.t1" class="form-control" placeholder="Titulo"/> <br>
                                    <input type="text" v-model="content.desc1" class="form-control" placeholder="Descrição"/><br>
                                    <input-file :url.sync="content.card1" ></input-file>
                                    <label>No Ver Mais</label><br>
                                    <input type="text" v-model="content.tv1" class="form-control" placeholder="Nome"/><br>
                                    <input type="text" v-model="content.h1" class="form-control" placeholder="Carga Horaria"/><br>
                                    <input type="text" v-model="content.descv1" class="form-control" placeholder="Descrição"/><br>
                                    
                                    
                
                                </div>
                            </div>
                            <label>Card 2  </label>
                            <div class="card-body">
                            
                                <div class="form-group">
                                    <label>Visivel ?</label><br>
                                    <input v-model="content.v2" name="f2" type="radio" value="1">
                                    <label >Sim</label><br>
                                    <input v-model="content.v2" name="f2" type="radio" value="0">
                                    <label >Não</label><br>

                                    <input type="text" v-model="content.t2" class="form-control" placeholder="Titulo"/><br>                                    
                                    <input type="text" v-model="content.desc2" class="form-control" placeholder="Descrição"/><br>
                                    <input-file :url.sync="content.card2" ></input-file>
                                    <label>No Ver Mais</label><br>
                                    <input type="text" v-model="content.tv2" class="form-control" placeholder="Nome"/><br>
                                    <input type="text" v-model="content.h2" class="form-control" placeholder="Carga Horaria"/><br>
                                    <input type="text" v-model="content.descv2" class="form-control" placeholder="Descrição"/><br>
                                    

                                    
                                </div>
                            </div>
                            <label>Card 3</label>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Visivel ?</label><br>
                                    <input v-model="content.v3" name="f3" type="radio" value="1">
                                    <label >Sim</label><br>
                                    <input v-model="content.v3" name="f3" type="radio" value="0">
                                    <label >Não</label><br>

                                    <input type="text" v-model="content.t3" class="form-control" placeholder="Titulo"/><br>
                                    <input type="text" v-model="content.desc3" class="form-control" placeholder="Descrição"/><br>
                                    <input-file :url.sync="content.card3" ></input-file>
                                    <label>No Ver Mais</label><br>
                                    <input type="text" v-model="content.tv3" class="form-control" placeholder="Nome"/><br>
                                    <input type="text" v-model="content.h3" class="form-control" placeholder="Carga Horaria"/><br>
                                    <input type="text" v-model="content.descv3" class="form-control" placeholder="Descrição"/><br>
                              
                                </div>
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
