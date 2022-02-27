<template>
    <PageComponent>
        <header class="bg-white shadow">
            <div
                class="max-w-7xl mx-auto py-4 px-4 text-center sm:px-6 lg:px-8"
            >
                <h1 class="text-2xl font-bold text-gray-900">
                    UPDATE & MANAGING OF SUBJECTS
                </h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="grid grid-cols-3 gap-4">
                    <div class="mt-5 md:mt-0 col-span-1">
                        <form @submit.prevent="saveSubject">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-4 gap-6">
                                        <div class="col-span-6">
                                            <label
                                                for="subject_code"
                                                class="block text-sm font-medium text-gray-700"
                                                >Subject Code</label
                                            >
                                            <input
                                                type="text"
                                                name="subject_code"
                                                id="subject_code"
                                                v-model="model.Subject_Code"
                                                autocomplete="subject_code"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                        </div>

                                        <div class="col-span-6">
                                            <label
                                                for="subject_name"
                                                class="block text-sm font-medium text-gray-700"
                                                >Subject Name</label
                                            >
                                            <input
                                                type="text"
                                                name="subject_name"
                                                id="subject_name"
                                                v-model="model.Subject_Name"
                                                autocomplete="subject_name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                        </div>

                                        <div class="col-span-6">
                                            <label
                                                for="subject_type"
                                                class="block text-sm font-medium text-gray-700"
                                                >Subject Type</label
                                            >
                                            <input
                                                type="text"
                                                name="subject_type"
                                                id="subject_type"
                                                v-model="model.Subject_Type"
                                                autocomplete="subject_type"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                        </div>

                                        <div class="col-span-6">
                                            <label
                                                for="units"
                                                class="block text-sm font-medium text-gray-700"
                                                >Units</label
                                            >
                                            <input
                                                type="text"
                                                name="units"
                                                id="units"
                                                v-model="model.Units"
                                                autocomplete="units"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="px-4 py-3 bg-gray-50 text-center sm:px-6"
                                >
                                    <button
                                        type="submit"
                                        class="inline-flex justify-center py-2 px-28 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-span-2">
                        <div class="flex flex-col">
                            <div
                                class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                            >
                                <div
                                    class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                                >
                                    <div
                                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                                    >
                                        <table
                                            class="min-w-full divide-y divide-gray-200"
                                        >
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        Subject Name
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        Subject Code
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        Subject Type
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        Units
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="relative px-6 py-3"
                                                    >
                                                        <span class="sr-only"
                                                            >Edit</span
                                                        >
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200"
                                            >
                                                <tr
                                                    v-for="person in people"
                                                    :key="person.email"
                                                >
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap"
                                                    >
                                                        <div
                                                            class="flex items-center"
                                                        >
                                                            <div
                                                                class="flex-shrink-0 h-10 w-10"
                                                            >
                                                                <img
                                                                    class="h-10 w-10 rounded-full"
                                                                    :src="
                                                                        person.image
                                                                    "
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="ml-4">
                                                                <div
                                                                    class="text-sm font-medium text-gray-900"
                                                                >
                                                                    {{
                                                                        person.name
                                                                    }}
                                                                </div>
                                                                <div
                                                                    class="text-sm text-gray-500"
                                                                >
                                                                    {{
                                                                        person.email
                                                                    }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap"
                                                    >
                                                        <div
                                                            class="text-sm text-gray-900"
                                                        >
                                                            {{ person.title }}
                                                        </div>
                                                        <div
                                                            class="text-sm text-gray-500"
                                                        >
                                                            {{
                                                                person.department
                                                            }}
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap"
                                                    >
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                                                        >
                                                            Active
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                                    >
                                                        {{ person.role }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                                    >
                                                        <a
                                                            href="#"
                                                            class="text-indigo-600 hover:text-indigo-900"
                                                            >Edit</a
                                                        >
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /End replace -->
            </div>
        </main>
    </PageComponent>
</template>

<script setup>
import store from '../store'
import { ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()

let model = ref({
    Subject_Code: '',
    Subject_Name: '',
    Subject_Type: null,
    Units: '',
})

if (route.params.id) {
    model.value = store.state.surveys.find(
        (s) => s.id === parseInt(route.params.id)
    )
}

function saveSubject() {
    store.dispatch('saveSubject', model.value).then(({ data }) => {
        router.push({
            name: 'Subjects',
            params: { id: data.data.id },
        })
    })
}
</script>
