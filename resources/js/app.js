//import Vue from 'vue';
//import VueI18n from 'vue-i18n';
//import Locales from './vue-i18n-locales.generated';
//import VeeValidate from 'vee-validate';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.config.productionTip = false;

//Vue.use(VueI18n);
//Vue.use(VeeValidate);

/**
 * Adding fontawesome svg icons to our code
 */
import {library} from '@fortawesome/fontawesome-svg-core';
import {faHome, faPlusCircle, faThumbsUp as fasThumbsUp, faEllipsisH, faAngleDown, faAngleLeft} from '@fortawesome/free-solid-svg-icons';
import {faThumbsUp as farThumbsUp} from '@fortawesome/free-regular-svg-icons';
import {faFacebook, faGithub, faGoogle} from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faFacebook, faGoogle, faGithub, faHome, faPlusCircle, fasThumbsUp, farThumbsUp, faEllipsisH, faAngleDown, faAngleLeft);
//dom.watch();

Vue.component('fa-icon', FontAwesomeIcon);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./components', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
