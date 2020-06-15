<template>
        <form action=""  v-on:submit.prevent="todatabase()">
            <v-card>
                <v-card-title>
                    <h5>Cliente</h5>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Entel" required v-model="cliente.nombre"> 
                            </div>
                            <div class="form-group col-md-6">
                                <label>RUT</label>
                                <input type="text" class="form-control" placeholder="76.000.000-6" v-model="cliente.rut">
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="clientehabilitado" v-model="cliente.habilitado">
                            <label class="custom-control-label" for="clientehabilitado">Habilitado</label>
                        </div>
                    </v-container>
                    <v-card-actions>
                        <v-btn color="red" dark>Cancelar</v-btn>
                        <v-btn type="submit" class="btn btn-primary">Save changes</v-btn>
                    </v-card-actions>
                </v-card-text>
            </v-card>
        </form>
</template>

<script>
    export default {
        props:['data'],
        data(){
            return {
                cliente:{
                    id:null,
                    nombre:'',
                    rut:'',
                    habilitado:true
                }
            }
        },
        mounted() {

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
                        this.$emit('update',res.data)
                    }else{
                        this.$emit('insert',res.data)
                    }
                })

            }
        },
        watch: {
            data: function (val) {
                if(val==null){
                    this.cliente={
                        id:null,
                        nombre:'',
                        rut:'',
                        habilitado:true
                    }
                }else{
                    this.cliente=JSON.parse(JSON.stringify(val));
                }
            },
        }
    }
</script>