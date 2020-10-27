require('./bootstrap');
window.Vue = require('vue');
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios);

const app = new Vue({
    data () {
        return {
            
        }
      },
    },
  el: '#main',
});
