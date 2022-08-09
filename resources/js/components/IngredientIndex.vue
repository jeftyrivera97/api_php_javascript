<template>

    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
            <p >Ingredients Lists</p>
            <br>
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</span>
                    </th>
                        <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                    </th>
                            <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Stock</span>
                    </th>
                </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 divide-solid">

                    <tr v-for="i in records" :key="i.id" class="bg-white">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{i.id}}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{i.name}}
                        </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{i.quantity}}
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
       let response = await axios.get('api/ingredients')
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


