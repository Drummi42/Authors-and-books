
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
import LibraryIndex from './components/library/LibraryIndex.vue';

import AuthorIndex from './components/library/author/AuthorIndex.vue';
import AuthorCreate from './components/library/author/AuthorCreate.vue';
import AuthorEdit from './components/library/author/AuthorEdit.vue';

import BookIndex from './components/library/book/BookIndex.vue';
import BookEdit from './components/library/book/BookEdit.vue';
import BookCreate from './components/library/book/BookCreate.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const routes = [
    { path: '/', component: LibraryIndex, name: 'indexLibrary' },

    { path: '/authors', component: AuthorIndex, name: 'indexAuthor' },
    { path: '/authors/create', component: AuthorCreate, name: 'createAuthor' },
    { path: '/authors/edit/:id', component: AuthorEdit, name: 'editAuthor' },

    { path: '/books', component: BookIndex, name: 'indexBook' },
    { path: '/books/create', component:BookCreate, name: 'createBook' },
    { path: '/books/edit/:id', component: BookEdit, name: 'editBook' },
];

const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');
