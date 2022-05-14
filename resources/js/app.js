import VueStarRating from 'vue-star-rating'

window.Vue = require('vue');


Vue.component('rating-form', require('./components/RatingForm.vue').default);
Vue.component('star-rating', VueStarRating);
Vue.component('search-component', require('./components/SearchComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
