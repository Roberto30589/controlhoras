require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('cliente-form', require('./components/clientes/FormComponent.vue').default);
Vue.component('cliente-list', require('./components/clientes/ListComponent.vue').default);

const app = new Vue({
    el: '#app',
});
