<template>
    <div class="container">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="main-box clearfix">
			<div class="table-responsive">
				<table class="table user-list">
					<thead>
						<tr>
							<th><span>#</span></th>
							<th><span>Nome</span></th>
							<th class="text-center"><span>Janela de Tempo</span></th>
							<th><span>Ultima Atualização</span></th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody v-for="event in data">
						<tr v-if="event.id != null">
							<td>
								<span class="user-subhead">{{event.id}}</span>
							</td>
							<td>
								{{event.name}}
							</td>
							<td class="text-center">
								<span class="label label-default">{{event.time}}</span>
							</td>
							<td>
								<span class="label label-default">{{event.updated_at}}</span>
							</td>
							<td style="width: 20%;">
								<button @click="deleteD(event.id, event.name)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                <a :href="'/user/job/'+event.id"><button class="btn btn-primary"><i class="far fa-edit"></i></button></a>
                            </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
	<a href="createJob"><button class="btn btn-primary">Criar</button></a>
</div>

    </div>
</template>

<script>
    export default {
        
        
        data: function () {
          return {
              data: null
          }
        },
        methods: {
            deleteD(id, name){
				var local = this;
				axios.get('/api/job/deleteD/'+id)
				.then(function (response) {
					window.location.reload();
                    local.dNot(name);
                });
			},
			dNot(name){
                this.$toaster.success('Evento '+name+' deletado com Sucesso');
				
            },
            getJobs() {
                var local = this;
                axios.get('/api/getJ')
                .then(function (response) {
                    local.data = response.data;
                    console.log(local.data);
                })
        },
        
        
        },
        mounted() {
           this.getJobs();
        },
    }
</script>
