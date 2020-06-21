require('./bootstrap');

window.Vue = require('vue');

Vue.component('cliente-form', require('./components/clientes/FormComponent.vue').default);
Vue.component('cliente-list', require('./components/clientes/ListComponent.vue').default);

Vue.component('proyecto-form', require('./components/proyectos/FormComponent.vue').default);
Vue.component('proyecto-list', require('./components/proyectos/ListComponent.vue').default);

const app = new Vue({
    el: '#app',
});
