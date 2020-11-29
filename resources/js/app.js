require('./bootstrap');
window.Vue = require('vue');
import VueAxios from 'vue-axios';
import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueAxios, axios);
Vue.use(VueSweetalert2);

Vue.component('client-header', require('./Header.vue').default);
Vue.component('client-footer', require('./Footer.vue').default);
Vue.component('index', require('./Index.vue').default);

const app = new Vue({
    data () {
        return {

        }
      },
  el: '#main'
});
