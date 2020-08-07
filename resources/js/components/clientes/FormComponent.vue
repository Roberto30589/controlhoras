<template>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <form action="" v-on:submit.prevent="todatabase()">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Entel" required v-model="cliente.nombre"> 
                            </div>
                            <div class="form-group col-md-6">
                                <label>RUT</label>
                                <input type="text" class="form-control" placeholder="76.000.000-6" v-model="cliente.rut">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" v-model="cliente.habilitado">
                                    <label class="form-check-label" for="gridCheck" >
                                        {{cliente.habilitado ? 'Habilitado' : 'Deshabilitado'}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    class Cliente{
        constructor(){
            this.id=null;
            this.nombre='';
            this.rut='';
            this.habilitado=true;
        }
    }
    export default {
        props:['dataIN'],
        data(){
            return {
                cliente:new Cliente(),
            }
        },
        mounted() {
            console.log('Componente ClienteForm Montado');
        },
        methods:{
            todatabase(){
                var url='/controlhoras/public/clientes/insert';
                if(this.cliente.id != null){
                    url='/controlhoras/public/clientes/update';
                }
                axios.post(url,this.cliente)
                .then(res => {
                    if(this.cliente.id != null){
                        this.$emit('update',res.data);
                        console.log('UPDATE');
                    }else{
                        this.$emit('insert',res.data);
                        this.cliente = new Cliente();
                        console.log('INSERT');
                    }
                })
            }
        },
        watch: {
            dataIN: function (get) {
                if(get==null){
                    this.cliente =  new Cliente();
                }else{
                    this.cliente = JSON.parse(JSON.stringify(get));
                }
            }
        }
    }
</script>