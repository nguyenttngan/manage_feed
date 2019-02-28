
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import FeedList from './components/feeds/List.vue';
import FeedRead from './components/feeds/Read.vue';
import FeedAdd from './components/feeds/Form.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = [
  {
      path: '/',
      components: {
          FeedList,
          FeedRead
      },
  },
  // {path: '/test', component: CatsCreate, name: 'createCompany'},
  // {path: '/admin/cats/edit/:id', component: CatsEdit, name: 'editCompany'},
]

const router = new VueRouter({ routes })

const app = new Vue({
    el: '#app',
    router,
    components: {
        FeedList,
        FeedRead,
        FeedAdd
    }
});
