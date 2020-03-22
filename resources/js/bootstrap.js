import axios from 'axios';
import Vue from 'vue';

let token = document.head.querySelector('meta[name="csrf-token"]');

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
window.Vue = Vue;
