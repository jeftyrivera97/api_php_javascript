<template>

    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <p >Market Shopping History</p>
        <br>
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Id</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Ingredient</span>
                    </th>
                        <th class="px-6 py-3 bg-gray-50">
                       <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Stock</span>
                    </th>
                  <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Date</span>
                    </th>
                </tr>
            </thead>
                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <tr v-for="c in records" :key="c.id" class="bg-white">
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{c.id}}
                    </td>
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{c.ingredient.name}}
                    </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{c.quantity}}
                    </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{c.created_at}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
export default {
  setup() {
    const records= ref([])

    const registros = async() =>{
       let response = await axios.get('api/mercados')
        .then(response => {
            records.value= response.data.data;
            console.log(records.value)
    })
    }
    onMounted(() => {
            registros()
        })

    return {
        records
        };
  },
};
</script>

