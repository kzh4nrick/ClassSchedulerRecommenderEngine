<template>
    <PageComponent>
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 text-center sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-gray-900">UPDATE & MANAGING OF FACULTY</h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="grid grid-cols-2 gap-4">
                <div class="mt-5 md:mt-0">
                    <form action="#" method="POST">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-4 gap-6">
                            <div class="col-span-6">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Faculty Name</label>
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                            </div>

                            <div class="col-span-6">
                            <label for="country" class="block text-sm font-medium text-gray-700">College Department</label>
                            <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>BUCS</option>
                                <option>BUCAL</option>
                                <option>BUCN</option>
                            </select>
                            </div>

                            <div class="col-span-6">
                            <label for="street-address" class="block text-sm font-medium text-gray-700">Faculty ID</label>
                            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                            </div>

                        </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-28 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="">
                    <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">College Department</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Faculty Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Faculty ID</th>
                                <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="person in people" :key="person.email">
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" :src="person.image" alt="" />
                                    </div>
                                    <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ person.name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ person.email }}
                                    </div>
                                    </div>
                                </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ person.title }}</div>
                                <div class="text-sm text-gray-500">{{ person.department }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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

<script>
export default {

}

</script>
