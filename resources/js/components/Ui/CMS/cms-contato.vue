<template>
    <div v-if="content.id != null" class="row mb-sm-3">
    	<div class="col-md-1 col-sm-3"></div>
		<div class="col-md-10 col-sm-6">
            <section class="page-section my-50" id="contact">
            
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Entre em Contato</h2>
                
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        
                        <form id="contactForm">
                            <!-- Name-->
                            <div class="form-floating mb-3">
                                <label for="name">Nome</label>
                                <input class="form-control" id="name" type="text" placeholder="" data-sb-validations="required" data-sb-can-submit="no">
                            </div>
                            <!-- Email -->
                            <div class="form-floating mb-3">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" data-sb-can-submit="no">
                            </div>
                            <!-- Telefone -->
                            <div class="form-floating mb-3">
                                <label for="phone">Telefone</label>
                                <input class="form-control" id="phone" type="tel" placeholder="" data-sb-validations="required" data-sb-can-submit="no">
                            </div>
                            <!-- Mensagem -->
                            <div class="form-floating mb-3">
                                <label for="message">Mensagem</label>
                                <textarea class="form-control" id="message" type="text" placeholder="" style="height: 10rem" data-sb-validations="required" data-sb-can-submit="no"></textarea>
                            </div>
                           
                            <button class="btn btn-primary" id="submitButton" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
		</div>
		<div class="col-md-1 col-sm-3">
			<button @click="content.id = null" type="button" class="btn btn-outline-danger mb-50">
                Remover
            </button>
                
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
