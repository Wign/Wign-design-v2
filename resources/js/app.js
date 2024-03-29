//import VueI18n from 'vue-i18n';
//import Locales from './vue-i18n-locales.generated';
//import VeeValidate from 'vee-validate';
import Vue from 'vue'
import VueApollo from 'vue-apollo'
import ApolloClient from 'apollo-boost';

const apolloClient = new ApolloClient({
    // You should use an absolute URL here
    uri: 'http://localhost/graphql',
    credentials: 'same-origin',
    headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        'X-Requested-With': 'XMLHttpRequest'
    }
});

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = Vue;
Vue.config.productionTip = false;
Vue.use(VueApollo);

Vue.prototype.$userLoggedIn = document.querySelector("meta[name='user-logged']").getAttribute('content') === "1";

//Vue.use(VueI18n);
//Vue.use(VeeValidate);

/**
 * Adding fontawesome svg icons to our code
 */
import {library} from '@fortawesome/fontawesome-svg-core';
import {
    faHome,
    faPlusCircle,
    faThumbsUp as fasThumbsUp,
    faEllipsisH,
    faAngleDown,
    faAngleLeft,
    faHandPointUp as fasHandPointUp
} from '@fortawesome/free-solid-svg-icons';
import {faThumbsUp as farThumbsUp, faHandPointUp as farHandPointUp} from '@fortawesome/free-regular-svg-icons';
import {faFacebook, faGithub, faGoogle} from '@fortawesome/free-brands-svg-icons';
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

library.add(faFacebook, faGoogle, faGithub, faHome, faPlusCircle, fasThumbsUp, farThumbsUp, faEllipsisH, faAngleDown, faAngleLeft, fasHandPointUp, farHandPointUp);
//dom.watch();

Vue.component('fa-icon', FontAwesomeIcon);

/**
 * Using instantsearch from algolia in front
 * Dropped and uses a standard instead
 */
//import InstantSearch from 'vue-instantsearch';
//Vue.use(InstantSearch);

/**
 * Using autocomplete in search inputs
 */
import Autocomplete from '@trevoreyre/autocomplete-vue'
import '@trevoreyre/autocomplete-vue/dist/style.css'

Vue.use(Autocomplete)

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
new Vue({
    el: '#app',
    apolloProvider
});
