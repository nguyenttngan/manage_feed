require('./bootstrap');

window.Vue = require('vue');
export const eventBus = new Vue();
import swal from 'sweetalert2';
window.swal = swal;
import router from './router.js'
import HeaderComponent from './components/HeaderComponent'
import SidebarComponent from './components/Sidebar'


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    components: {
        HeaderComponent,
        SidebarComponent
    }
});
