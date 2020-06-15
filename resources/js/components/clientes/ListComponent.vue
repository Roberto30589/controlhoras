<template>
    <v-app>
        <v-btn rounded color="primary" dark  v-on:click="clienteForm(null)">Agregar</v-btn>
        
        <v-dialog max-width="600px" v-model="clienteModal">
        <cliente-form 
            @insert="clienteInsert"
            @update="clienteUpdate"
            :data="cliente"
        >
        </cliente-form>
        </v-dialog>
        <v-card>
            <div class="card-header">
                Clientes 
            </div>
                <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tr v-for="(cliente) in clientes" :key="cliente.id" v-show="cliente.habilitado">
                        <td>
                            {{cliente.nombre}}
                        </td>
                        <td>
                            {{cliente.rut}}
                        </td>
                        <td width="1">
                            <button class="form-control btn btn-outline-primary" v-on:click="clienteForm(cliente)">editar</button>
                        </td>
                    </tr>
                </table>
            </div>
        </v-card>
    </v-app>
</template>
<script>
    export default {
        data(){
            return {
                clientes:[],
                cliente:null,
                clienteModal:false,
            }
        },
        created(){
            axios.get('list')
                .then(res =>{
                    this.clientes = res.data;
                });
        },
        mounted() {
            console.log('Componente List Montado');
        },
        methods:{
            clienteForm(cliente){
                this.cliente=cliente;
                this.clienteModal=true;
            },
            clienteInsert(cliente){
                this.clientes.push(cliente);
                console.log(this.clientes);
                $('#addModal').modal('hide');
            },
            clienteUpdate(cliente){
                Object.assign(this.cliente, cliente);
                console.log(this.clientes);
                $('#addModal').modal('hide');
            },
        }
    }
</script>