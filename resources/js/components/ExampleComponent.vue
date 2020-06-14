<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        Soy un Ejemplo de Componente.
                        {{saludo}}
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
                saludo:'hola',
            }
        },
        mounted() {
            console.log('Componente Montado')
        }
    }
</script>
