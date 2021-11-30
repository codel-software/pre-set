<template>
    <div class="container">
        <div v-if="job != null" class="row">
            <div class="col-6">
                <AceEditor 
                    v-model="job.code" 
                    @init="editorInit" 
                    lang="php" 
                    theme="monokai" 
                    width="500px" 
                    height="500px"
                    :options="{
                        enableBasicAutocompletion: true,
                        enableLiveAutocompletion: true,
                        fontSize: 14,
                        highlightActiveLine: true,
                        enableSnippets: true,
                        showLineNumbers: true,
                        tabSize: 2,
                        showPrintMargin: false,
                        showGutter: true,
                    }"
                    :commands="[
                        {
                            name: 'save',
                            bindKey: { win: 'Ctrl-s', mac: 'Command-s' },
                            exec: dataSumit,
                            readOnly: true,
                        },
                    ]"
                    />
            </div>
            <div class="col-6">
            <div>
                

                <label>Nome</label>
                <input class="form-control" v-model="job.name">

                <label>Janela de Tempo</label>
                <input class="form-control mb-2" v-model="job.time" />

                <button class="btn btn-primary" @click="save()">Salvar </button>
            </div>
            </div>
        </div>

          
    </div>
</template>

<script>
    import AceEditor from 'vuejs-ace-editor';
    export default {
        props:['id'],
         components: {
            AceEditor
        },
        mounted() {
            this.getJob();
        },
        data: function () {
          return {
              job: null
          }
        },
        methods: {
        dataSumit() {
            //code here
        },
        save() {
            let local = this;

            axios.put('/api/job/'+ this.id, this.job)
                .then(function (response) {
                    local.job = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
        },
        editorInit: function () {
            require('brace/ext/language_tools') //language extension prerequsite...
            require('brace/mode/php')    //language
            require('brace/theme/monokai')
            require('brace/snippets/php') //snippet
        },
            getJob(){

                let local = this;

                axios.get('/api/job/'+ this.id)
                    .then(function (response) {
                        local.job = response.data;
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            }
        }
    }
</script>
