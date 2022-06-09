import { createRouter, createWebHistory } from 'vue-router'

import PaginaPrincipal from '../components/PaginaPrincipal.vue'
import RecipeIndex from '../components/RecipeIndex.vue'
import OrderIndex from '../components/OrderIndex.vue'
import IngredientIndex from '../components/IngredientIndex.vue'
import MercadoIndex from '../components/MercadoIndex.vue'
const routes = [
    {
        path: '/inicio',
        name: 'inicio',
        component: PaginaPrincipal
    },
    {
        path: '/',
        name: '/',
        component: PaginaPrincipal
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: PaginaPrincipal
    },
    {
        path: '/recipes',
        name: 'recipes.index',
        component: RecipeIndex
    },
    {
        path: '/orders',
        name: 'orders.index',
        component: OrderIndex
    },
    {
        path: '/ingredients',
        name: 'ingredient.index',
        component: IngredientIndex
    },
    {
        path: '/mercados',
        name: 'dashboard.index',
        component: MercadoIndex
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
