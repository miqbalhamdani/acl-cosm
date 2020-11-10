import '~/plugins/bootstrap';
import bus from '~/plugins/bus';

Vue.config.devtools = true;
Vue.config.performance = true;

// BE
import ProductVariant from './components/product/ProductVariant';

// FE
import Detail from './pages/Detail.vue';

window.app = new Vue({
  el: '#app',

  bus,

  components: {
    ProductVariant,

    Detail,
  },
});
