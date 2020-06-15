window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue'
import vuetify from '../plugins/vuetify' // path to vuetify export

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('cliente-form', require('./components/clientes/FormComponent.vue').default);
Vue.component('cliente-list', require('./components/clientes/ListComponent.vue').default);

const app = new Vue({
    vuetify,
}).$mount('#app')
