require('./bootstrap');
require('./middleware');

import Vue from 'vue';

import {router} from './router';
import {store} from './store';

import MainApp from './components/MainApp';

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        MainApp
    }
});