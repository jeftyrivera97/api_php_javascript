
<template>
    <p>Bienvenido al Sistema de Jornada de Almuerzo Gratis!</p>
      <br>
     <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
     @click="generateOrder" >Generar Orden</button>
     <br>
     <br>
      <span v-if="records.length">Ordenes Generadas</span>
       <table v-if="records.length" class="min-w-full divide-y divide-gray-200 border">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Receta</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Estado</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Creacion</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ultima Actualizacion</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">

                <tr v-for="o in records" :key="o.id" class="bg-white">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{o.id}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{o.recipe.name}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{o.state}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{o.created_at}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{o.updated_at}}
                    </td>
                </tr>

            </tbody>
        </table>



</template>
<script>
import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default {
  setup() {
    const records= ref([])
    const generateOrder= async () => {
    let response = await axios.post('api/orders/recipes/create')
        .then(response => {
            records.value.push(response.data);
            console.log(records.value)
    })
    }
    return {
        generateOrder,
        records
        };
  },
};
</script>
