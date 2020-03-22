import "./bootstrap";
import BurgerMenu from "./BurgerMenu";

Vue.component('calculate-button', require('./components/CalculateButton.vue').default);

new Vue({
    el: '#app'
});

new BurgerMenu();
