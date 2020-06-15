<template>
    <form action=""  v-on:submit.prevent="todatabase()">
        <v-card>
            <v-card-title class="headline">Cliente</v-card-title>
            <v-card-text>
                <v-container>
                    <v-text-field label="Nombre Empresa" required v-model="cliente.nombre"></v-text-field>
                    <v-text-field label="RUT Empresa" v-model="cliente.rut"></v-text-field>
                    <v-switch  inset v-model="cliente.habilitado" :label="cliente.habilitado?'Habilitado':'Deshabilitado'"></v-switch>
                </v-container>
                <v-card-actions>
                    <v-btn color="red" dark @click="$emit('close')">Cancelar</v-btn>
                    <v-btn type="submit" color="blue darken-4" dark class="btn btn-primary">Save changes</v-btn>
                </v-card-actions>
            </v-card-text>
        </v-card>
    </form>
</template>

<script>
    export default {
        props:{
            dataIn:{
                default:{
                    id:null,
                    nombre:'',
                    rut:'',
                    habilitado:true
                }
            }
        },
        data(){
            return {
                cliente:null
            }
        },
        created(){
            this.cliente=JSON.parse(JSON.stringify(this.dataIn));
        },
        mounted() {
            console.log('Componente Cliente Form Montado');
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
            dataIn: function (val) {
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
            }
        }
    }
</script>