<template>
    <div>
        <cliente-form 
            id="addModal"
            @insert="clienteInsert"
            @update="clienteUpdate"
            :cliente="cliente"
        >
        </cliente-form>
        <div class="card">
            <div class="card-header">Clientes 
                <button v-on:click="clienteForm(null)">+</button>
            </div>
            <div class="card-body">
                <div class="form-row" v-for="(cliente,index) in clientes" :key="index">
                    <div class="form-group col-md-5">
                        <label>Nombre</label>
                        <p class="form-control">{{cliente.nombre}}</p> 
                    </div>
                    <div class="form-group col-md-5">
                        <label>RUT</label>
                        <p class="form-control">{{cliente.rut}}</p> 
                    </div>
                    <div class="form-group col-md-5">
                        <button v-on:click="clienteForm(cliente)">ver</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                clientes:[],
                cliente:{
                    id:null,
                    nombre:'',
                    rut:''
                }
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
                if(cliente==null){
                    this.cliente={
                        id:null,
                        nombre:'',
                        rut:''
                    }
                }else{
                    this.cliente=cliente;
                }
                $('#addModal').modal('show');
            },
            clienteInsert(cliente){
                this.clientes.push(cliente);
                $('#addModal').modal('hide');
            },
            clienteUpdate(cliente){
                this.cliente=cliente;
                $('#addModal').modal('hide');
            },
        }
    }
</script>