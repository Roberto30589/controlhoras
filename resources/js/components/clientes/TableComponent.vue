<template>
    <div style="height:100%">
        <cliente-form 
            id="addModal"
            @insert="clienteInsert"
            @update="clienteUpdate"
            :dataIN="cliente"
        >
        </cliente-form>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <button class="btn btn-info h6 material-icons mb-0" v-on:click="clienteForm(null)">add</button>
                    </div>
                    <div class="col-4" align="center">
                        <h2>Clientes</h2>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" v-model="habilitados">
                                <label class="form-check-label" for="gridCheck" >
                                    {{habilitados ? 'Habilitado' : 'Deshabilitado'}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <table width="100%" class="table table-bordered striped-table" style="background:white" id="tabla">
            <thead>
                <tr>
                    <th scope="col">
                        Identificador
                    </th>
                    <th scope="col">
                        Nombre
                    </th>
                    <th scope="col">
                        RUT
                    </th>
                    <th scope="col">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item) in clientes" :key="item.id" v-show="item.habilitado==habilitados" v-bind:class="[item.habilitado ? 'tr-activos' : 'tr-inactivos']">
                    <th scope="row"  width="1">
                        {{item.id}}
                    </th>
                    <td>
                        {{item.nombre}}
                    </td>
                    <td>
                        {{item.rut}} 
                    </td>
                    <td width="1" style="vertical-align:middle ;padding:0px;" align="center">
                        <button class="btn btn-info h6 material-icons mb-0" v-on:click="clienteForm(item)">
                            edit
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                clientes:[],
                cliente:{},
                habilitados:true,
            }
        },        
        created(){
            this.clienteGet();
        },
        mounted() {
            console.log('Componente List Montado');
        },
        methods:{
            clienteGet(){
                axios.get('list')
                    .then(res =>{
                        this.clientes = res.data;
                        this.tableSet();
                    });
            }, 
            tableSet(){
                $(function(){
                    $('#tabla').DataTable( {
                        "paging": false,
                        "info": false,
                    });
                });
            },
            clienteForm(cliente){
                this.cliente=cliente;
                $('#addModal').modal('show');
            },
            clienteInsert(cliente){
                this.clientes.push(cliente);
                $('#addModal').modal('hide');
            },
            clienteUpdate(cliente){
                Object.assign(this.cliente, cliente);
                $('#addModal').modal('hide');
            },
        },
    }
</script>