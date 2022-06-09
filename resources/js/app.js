import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import router from './router'

window.Alpine = Alpine;

import PaginaPrincipal from './components/PaginaPrincipal.vue';
import RecipeIndex from './components/RecipeIndex.vue';
import OrderIndex from './components/OrderIndex.vue';
import IngredientIndex from './components/IngredientIndex.vue';
import MercadoIndex from './components/MercadoIndex.vue';

createApp({
    data() {
        return { open: false}
        },
    components: {
        PaginaPrincipal,
        RecipeIndex,
        OrderIndex,
        IngredientIndex,
        MercadoIndex
    }
}).use(router).mount('#app')
