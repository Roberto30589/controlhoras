<template>
    <v-app>
        <v-dialog max-width="600px" v-model="clienteModal">
            <cliente-form
                @insert="clienteInsert"
                @update="clienteUpdate"
                @close="clienteClose"
                :dataIn="cliente"
            >
            </cliente-form>
        </v-dialog>

        <v-card>
            <v-data-table
                :headers="headers"
                :items="clientes"
                :search="search"
                class="elevation-1"
            >
            <template v-slot:top>
                <div class="card-header">
                    Clientes
                    <v-btn rounded color="primary" dark  v-on:click="clienteForm(null)">Agregar</v-btn>
                    <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Search"
                        single-line
                        hide-details
                    ></v-text-field>
                </div>
            </template>
            <template v-slot:item.actions="{ item }">
                <v-icon
                    class="mr-2"
                    @click="clienteForm(item)"
                >
                mdi-pencil
                </v-icon>
            </template>
            </v-data-table>
        </v-card>
    </v-app>
</template>
<script>
    export default {
        data(){
            return {
                search: '',
                clientes:[],
                headers:[
                    {
                    text: 'Nombre',
                    align: 'start',
                    value: 'nombre',
                    },
                    { text: 'RUT', value: 'rut' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                cliente:null,
                clienteModal:false,
                habilitados:true,
            }
        },
        created(){
            axios.get('list')
                .then(res =>{
                    this.clientes = res.data;
                });
        },
        mounted() {
            console.log('Componente Cliente List Montado');
        },
        methods:{
            clienteForm(cliente){
                this.cliente=cliente;
                this.clienteModal=true;
            },
            clienteInsert(cliente){
                this.clientes.push(cliente);
                this.clienteModal=false;
            },
            clienteUpdate(cliente){
                Object.assign(this.cliente, cliente);
                this.clienteModal=false;
            },
            clienteClose(){
                this.clienteModal=false;
            },            
        }
    }
</script>