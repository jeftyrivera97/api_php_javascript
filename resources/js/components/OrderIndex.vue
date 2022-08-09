<template>

    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <p >Orders History</p>
        <br>
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Id</span>
                    </th>
                     <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Recipe</span>
                    </th>
                         <th class="px-6 py-3 bg-gray-50">
                       <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Status</span>
                    </th>
                     <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Created On</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                       <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Last Updated</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 divide-solid">

                    <tr v-for="o in records" :key="o.id" class="bg-white">
                         <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{o.id}}
                        </td>
                         <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{o.recipe.name}}
                        </td>
                             <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{o.state}}
                        </td>
                           <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{o.created_at}}
                        </td>
                           <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{o.updated_at}}
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
       let response = await axios.get('api/orders')
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
