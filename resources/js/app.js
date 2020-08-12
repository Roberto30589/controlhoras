require('./bootstrap');

window.Vue = require('vue');

Vue.component('cliente-form', require('./components/clientes/FormComponent.vue').default);
Vue.component('cliente-table', require('./components/clientes/TableComponent.vue').default);

Vue.component('proyecto-form', require('./components/proyectos/FormComponent.vue').default);
Vue.component('proyecto-table', require('./components/proyectos/TableComponent.vue').default);

const app = new Vue({
    el: '#app',
});
