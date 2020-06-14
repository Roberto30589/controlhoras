<template>
    <form action="" v-submit.prevent="todatabase()">
    <div class="card">
        <div class="card-header">Cliente</div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre</label>
                    <input type="text" class="form-control" placeholder="Entel" required>
                </div>
                <div class="form-group col-md-6">
                    <label>RUT</label>
                    <input type="text" class="form-control" placeholder="76.000.000-6">
                </div>
                <button class="btn btn-primary col-12" type="submit">Submit form</button>
            </div>
        </div>
    </div>
    </form>
</template>

<script>
    export default {
        data(){
            return {
                cliente:{

                },
            }
        },
        mounted() {
            console.log('Componente Montado')
        },
        methods:{
            todatabase(){
                
            }
        }
    }
</script>