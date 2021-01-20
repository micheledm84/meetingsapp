/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//import Vue from 'vue';

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-table', require('./components/HomeTable.vue').default);
Vue.component('create-form', require('./components/CreateForm.vue').default);
Vue.component('report-meeting', require('./components/ReportMeeting.vue').default);
Vue.component('table-report', require('./components/TableReport.vue').default);
Vue.component('reporter-meeting', require('./components/ReporterMeeting.vue').default);
Vue.component('validated-errors', require('./components/ValidatedErrors.vue').default);
Vue.component('success-alert', require('./components/SuccessAlert.vue').default);
Vue.component('admin-operations', require('./components/AdminOperations.vue').default);
Vue.component('admin-panel', require('./components/AdminPanel.vue').default);
Vue.component('insert-employee', require('./components/InsertEmployee.vue').default);
Vue.component('edit-employee', require('./components/EditEmployee.vue').default);
Vue.component('delete-employee', require('./components/DeleteEmployee.vue').default);
Vue.component('insert-room', require('./components/InsertRoom.vue').default);
Vue.component('edit-room', require('./components/EditRoom.vue').default);
Vue.component('delete-room', require('./components/DeleteRoom.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
