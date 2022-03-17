<template>
        <header class="bg-white shadow">
            <div
                class="max-w-7xl mx-auto py-4 px-4 text-center sm:px-6 lg:px-8"
            >
                <h1 class="text-2xl font-bold text-gray-900">
                    UPDATE & MANAGING OF FACULTY
                </h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="mt-5 md:mt-0">
                        <form class="form" @submit.prevent="AddNewFaculty()">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-4 gap-6">

                                        <div class="col-span-6">
                                            <label
                                                for="faculty_name"
                                                class="block text-sm font-medium text-gray-700"
                                                >Faculty Name</label
                                            >
                                            <input
                                                v-if="facultyId == false"
                                                type="text"
                                                required
                                                v-model="v$.Faculty_Name.$model"
                                                @keyup="v$.Faculty_Name.$touch()"
                                                @blur="v$.Faculty_Name.$touch()"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <input
                                                v-else
                                                disabled
                                                type="text"
                                                v-model="model.Faculty_Name"
                                                autocomplete="Faculty_name"
                                                class="cursor-not-allowed mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <div v-if="v$.Faculty_Name.$error">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-red-500 inline ml-5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="inline text-sm font-medium text-red-500">
                                                    {{ v$.Faculty_Name.$errors[0].$message }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-span-6">
                                            <label
                                                for="college"
                                                class="block text-sm font-medium text-gray-700"
                                                >College Department</label
                                            >
                                            <select
                                                v-if="facultyId == false"
                                                required
                                                v-model="v$.college_id.$model"
                                                @keyup="v$.college_id.$touch()"
                                                @blur="v$.college_id.$touch()"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            >
                                                <option disabled value="">Lists of Colleges</option>
                                                <option v-for="lists in collegeList"
                                                        v-bind="lists.id"
                                                        :value="lists.id"
                                                        >
                                                        {{ lists.College_Name + " - " + lists.Campus }}
                                                </option>
                                            </select>
                                            <select
                                                v-else
                                                disabled
                                                v-model="model.college_id"
                                                class="cursor-not-allowed mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            >
                                                <option disabled value="">Lists of Colleges</option>
                                                <option v-for="lists in collegeList"
                                                        v-bind="lists.id"
                                                        :value="lists.id"
                                                        >
                                                        {{ lists.College_Name + " - " + lists.Campus }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-span-6">
                                            <label
                                                for="faculty_ID"
                                                class="block text-sm font-medium text-gray-700"
                                                >Faculty ID</label
                                            >
                                            <input
                                                v-if="facultyId == false"
                                                type="text"
                                                required
                                                v-model="v$.Faculty_ID.$model"
                                                @keyup="v$.Faculty_ID.$touch()"
                                                @blur="v$.Faculty_ID.$touch()"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <input
                                                v-else
                                                disabled
                                                type="text"
                                                v-model="model.Faculty_ID"
                                                class="cursor-not-allowed mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <div v-if="v$.Faculty_ID.$error">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-red-500 inline ml-5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="inline text-sm font-medium text-red-500">
                                                    {{ v$.Faculty_ID.$errors[0].$message }}
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div
                                    class="px-4 py-3 bg-gray-50 text-center sm:px-6"
                                >
                                    <input
                                        v-if="v$.$invalid || facultyId != false"
                                        disabled
                                        type="submit" :value="'Save'"
                                        class="cursor-not-allowed button inline-flex justify-center py-2 border border-transparent block w-full shadow-sm text-sm font-medium rounded-md text-white bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    />
                                    <input
                                        v-else
                                        @click="postAjaxForm"
                                        type="submit" :value="'Save'"
                                        class="cursor-pointer button inline-flex justify-center py-2 border border-transparent block w-full shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        <div class="flex flex-col">
                            <div
                                class="-my-2 overflow-x-auto h-96 sm:-mx-6 lg:-mx-8"
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
                                                        College Department
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        Faculty ID
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        Faculty Name
                                                    </th>
                                                    <th
                                                    >
                                                        <span class="sr-only"
                                                            >Edit</span
                                                        >
                                                    </th>
                                                    <th
                                                    >
                                                    <div class="relative right-16 w-20">
                                                        <input type="text" class="bg-gray-50 border border-gray-300 text-left text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-36 h-8" placeholder="Search..." v-model="searchQuery" />
                                                        <div class="flex absolute inset-y-0 left-24 items-center pl-5 pointer-events-none">
                                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                                        </div>
                                                    </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200"
                                            >
                                                <tr
                                                    v-for="list in searchedFaculties"
                                                    :key="list.id"
                                                    v-if="facultyList.length > 0"
                                                    class="hover:bg-gray-100"
                                                >
                                                    <td v-if="facultyId == list.id" class="bg-gray-100 pl-3 w-full">
                                                        <select
                                                            v-model="model2.college_id"
                                                            :id="'faculty-edit-${list.id}'"
                                                            class="border-0 py-1.5 text-sm font-medium text-sky-600 bg-gray-100 w-full"
                                                        >
                                                            <option disabled value="">Lists of Colleges</option>
                                                            <option v-for="lists in collegeList"
                                                                    v-bind="lists.id"
                                                                    :value="lists.id"
                                                                    >
                                                                    {{  lists.College_Name + " - " + lists.Campus }}
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td v-else @click="setToEditing(list.id)"
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                    >
                                                            <span v-html="highlightMatches(list.college_id)"></span>
                                                    </td>
                                                    <!-- <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                    >
                                                            {{
                                                                list.college.College_Name
                                                            }}
                                                    </td> -->
                                                    <td v-if="facultyId == list.id" class="bg-gray-100 pl-3 w-1/5">
                                                        <input type="text" v-model="model2.Faculty_ID"
                                                            :id="'faculty-edit-${list.id}'"
                                                            @keydown.enter="updateFaculty()"
                                                        class="border-0 py-4 whitespace-nowrap text-sm text-sky-600 font-medium text-gray-900 bg-gray-100 h-px w-full"/>
                                                    </td>
                                                    <td v-else @click="setToEditing(list.id)"
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                    >
                                                            <span v-html="highlightMatches(list.Faculty_ID)"></span>
                                                    </td>
                                                    <td v-if="facultyId == list.id" class="bg-gray-100 pl-3 py-2.5 w-1/4">
                                                        <input type="text" v-model="model2.Faculty_Name"
                                                            :id="'faculty-edit-${list.id}'"
                                                            @keydown.enter="updateFaculty()"
                                                        class="border-0 py-4 whitespace-nowrap text-sm text-sky-600 font-medium text-gray-900 bg-gray-100 h-px w-full"/>
                                                    </td>
                                                    <td v-else @click="setToEditing(list.id)"
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                    >
                                                            <span v-html="highlightMatches(list.Faculty_Name)"></span>
                                                    </td>
                                                    <td v-if="facultyId == list.id" class="bg-gray-100 w-1/12">
                                                        <button
                                                            class="px-3 py-4 text-sm font-medium text-sky-600 hover:text-sky-900"
                                                            @click="updateFaculty()"
                                                            >Update</button>
                                                    </td>
                                                    <td v-else
                                                        class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium"
                                                    >
                                                        <a
                                                            href="#" @click="() => setToEditing(list.id)"
                                                            class="text-green-500 hover:text-green-900"
                                                            >Edit</a
                                                        >
                                                        <!-- <button 
                                                            @click="setToEditing(list.id)"
                                                            class="text-green-500 hover:text-green-900"
                                                            >Edit
                                                        </button> -->
                                                    </td>
                                                    <td v-if="facultyId == list.id" class="bg-gray-100 w-1/12">
                                                        <a
                                                            href="#" @click="() => cancelEdit()"
                                                            class="pl-5 py-4 whitespace-nowrap text-sm font-medium text-red-600 hover:text-red-900"
                                                            >Cancel</a>
                                                    </td>
                                                    <td v-else
                                                        class="px-3 py-4 whitespace-nowrap indent-2 text-left text-sm font-medium"
                                                    >
                                                        <a
                                                            href="#" @click="() => deleteFaculty(list.id)"
                                                            class="text-red-600 hover:text-red-900"
                                                            >Delete</a
                                                        >
                                                    </td>
                                                </tr>
                                                <tr class="EmptyFaculties" v-else>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">No Record of Faculties.</td>
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
</template>

<script>
import { ref, computed } from 'vue'
import { useVuelidate } from '@vuelidate/core';
import { required, alpha } from '@vuelidate/validators';

import APIController from '../controllers/api'

export default {
    name: 'Faculty',
    setup () {
        const initialState = {
            Faculty_ID: '',
            Faculty_Name: '',
            college_id: '',
        }
        const model = ref({...initialState});

        const rules = computed(() => {
            return {
                Faculty_ID: { required },
                Faculty_Name: { required, alpha },
                college_id: { required }
            }
        })

        const v$ = useVuelidate(rules, model)

        const model2 = ref([]);
        const searchQuery = ref("");

        const facultyList = ref({});
        const facultyId = ref(false);

        const collegeList = ref({});

         const reset = () => {
            model.value = {...initialState};
        }
        const fetchFaculties = async () => {
            facultyList.value = await APIController.FetchFaculties();
        }
        const fetchColleges = async () => {
            collegeList.value = await APIController.FetchColleges();
        }

        // const toggleCourse = (id = false) => {
        //     courseId.value = false;

        //     if (id) {
        //         courseId.value = id;
        //         GetCourse();
        //     }
        // }
        
        const GetFaculty = async () => {
            model2.value = await APIController.FetchFaculty(facultyId.value);
        }

        const AddNewFaculty = async () => {
            let tempFaculty = await APIController.CreateFaculty(model.value.Faculty_ID, model.value.Faculty_Name, model.value.college_id);
            if (tempFaculty) {
                fetchFaculties(),
                reset();
            }
        }

        const updateFaculty = async () => {
            let tempFaculty = await APIController.UpdateFaculty(model2.value.Faculty_ID, model2.value.Faculty_Name, model2.value.college_id, facultyId.value);
            if (tempFaculty) {
                fetchFaculties(),
                GetFaculty();
                facultyId.value = false;
            }
        }

        const deleteFaculty = async id => {
            const success = await APIController.DeleteFaculty(id);

            if (success) {
                fetchFaculties();
            }
        }

        const searchedFaculties = computed(() => {
            return facultyList.value.filter((list) => {
                return (
                list.Faculty_Name
                    .toLowerCase()
                    .indexOf(searchQuery.value.toLowerCase()) != -1 ||
                list.Faculty_ID
                    .toLowerCase()
                    .indexOf(searchQuery.value.toLowerCase()) != -1 ||
                list.college_id
                    .toString()
                    .toLowerCase()
                    .indexOf(searchQuery.value.toLowerCase()) != -1
            )});
        });

         function highlightMatches(text) {
            text = text.toString();
            const matchExists = text.toLowerCase().includes(searchQuery.value.toLowerCase());
            if (!matchExists) return text;

            const re = new RegExp(searchQuery.value, 'ig');
            return text.replace(re, matchedText => `<strong style="color:#106096">${matchedText}</strong>`);
        }

        function setToEditing(list) {
            facultyId.value = list;
            GetFaculty();
            // this.$refs.search.focus();
            setTimeout(()=> {
                document.getElementById('faculty-edit-${list.id}').focus()
            }, 1);
        }
        
        function cancelEdit(){
            facultyId.value = false;
        }

        return {
            model,
            model2,
            facultyList,
            fetchFaculties,
            AddNewFaculty,
            deleteFaculty,
            GetFaculty,
            updateFaculty,
            // toggleCourse,
            facultyId,
            collegeList,
            fetchColleges,
            reset,
            searchedFaculties,
            searchQuery,
            highlightMatches,
            setToEditing,
            cancelEdit,
            v$,
        }
    },
    mounted () {
        if (this.facultyId != false){
            this.GetFaculty();
        }
        this.fetchFaculties();
        this.fetchColleges();
    },
    methods: {
        postAjaxForm () {
            this.v$.$reset();
        }
    },
}
</script>
