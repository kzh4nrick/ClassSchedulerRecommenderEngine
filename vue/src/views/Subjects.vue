<template>
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
                        <form class="form" @submit.prevent="AddNewSubject()">
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
                                                v-if="subjectId == false"
                                                type="text"
                                                required
                                                v-model="v$.Subject_Code.$model"
                                                @keyup="v$.Subject_Code.$touch()"
                                                @blur="v$.Subject_Code.$touch()"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <input
                                                v-else
                                                disabled
                                                type="text"
                                                v-model="model.Subject_Code"
                                                class="cursor-not-allowed mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <div v-if="v$.Subject_Code.$error">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-red-500 inline ml-5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="inline text-sm font-medium text-red-500">
                                                    {{ v$.Subject_Code.$errors[0].$message }}
                                                </span>
                                            </div>
                                            <!-- <template v-if="v$.Subject_Code.$dirty">
                                            <div v-for="error of v$.Subject_Code.$silentErrors" :key="error.$message">
                                                {{ error.$message }}
                                            </div>
                                            </template> -->
                                        </div>

                                        <div class="col-span-6">
                                            <label
                                                for="subject_name"
                                                class="block text-sm font-medium text-gray-700"
                                                >Subject Name</label
                                            >
                                            <input
                                                v-if="subjectId == false"
                                                type="text"
                                                required
                                                v-model="v$.Subject_Name.$model"
                                                @keyup="v$.Subject_Name.$touch()"
                                                @blur="v$.Subject_Name.$touch()"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <input
                                                v-else
                                                disabled
                                                type="text"
                                                name="subject_name"
                                                id="subject_name"
                                                v-model="model.Subject_Name"
                                                autocomplete="subject_name"
                                                class="cursor-not-allowed mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <div v-if="v$.Subject_Name.$error">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-red-500 inline ml-5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="inline text-sm font-medium text-red-500">
                                                    {{ v$.Subject_Name.$errors[0].$message }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-span-6">
                                            <label
                                                for="subject_type"
                                                class="block text-sm font-medium text-gray-700"
                                                >Subject Type</label
                                            >
                                            <input
                                                v-if="subjectId == false"
                                                type="text"
                                                required
                                                v-model="v$.Subject_Type.$model"
                                                @keyup="v$.Subject_Type.$touch()"
                                                @blur="v$.Subject_Type.$touch()"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <input
                                                v-else
                                                disabled
                                                type="text"
                                                name="subject_type"
                                                id="subject_type"
                                                v-model="model.Subject_Type"
                                                autocomplete="subject_type"
                                                class="cursor-not-allowed mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <div v-if="v$.Subject_Type.$error">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-red-500 inline ml-5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="inline text-sm font-medium text-red-500">
                                                    {{ v$.Subject_Type.$errors[0].$message }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-span-6">
                                            <label
                                                for="units"
                                                class="block text-sm font-medium text-gray-700"
                                                >Units</label
                                            >
                                            <input
                                                v-if="subjectId == false"
                                                type="text"
                                                required
                                                v-model="v$.Units.$model"
                                                @keyup="v$.Units.$touch()"
                                                @blur="v$.Units.$touch()"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <input
                                                v-else
                                                disabled
                                                type="text"
                                                name="units"
                                                id="units"
                                                v-model="model.Units"
                                                autocomplete="units"
                                                class="cursor-not-allowed mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <div v-if="v$.Units.$error">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-red-500 inline ml-5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="inline text-sm font-medium text-red-500">
                                                    {{ v$.Units.$errors[0].$message }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="px-4 py-3 bg-gray-50 text-center sm:px-6"
                                >
                                    <input
                                        v-if="v$.$invalid || subjectId != false"
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
                    <div class="col-span-2">
                        <div class="flex flex-col">
                            <div
                                class="-my-2sm:-mx-6 overflow-x-auto h-96 lg:-mx-8"
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
                                                    v-for="list in searchedSubjects"
                                                    :key="list.id"
                                                    v-if="subjectList.length > 0"
                                                    class="hover:bg-gray-100"
                                                >
                                                    <td v-if="subjectId == list.id" class="bg-gray-100 pl-3 py-2.5 w-1/4">
                                                        <input type="text" v-model="model2.Subject_Name"
                                                            :id="'subject-edit-${list.id}'"
                                                            @keydown.enter="updateSubject()"
                                                        class="border-0 py-4 whitespace-nowrap text-sm text-sky-600 font-medium text-gray-900 bg-gray-100 h-px w-full"/>
                                                    </td>
                                                    <td v-else @click="setToEditing(list.id)"
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                    >
                                                            <!-- {{
                                                                list.Subject_Name
                                                            }} -->
                                                            <span v-html="highlightMatches(list.Subject_Name)"></span>
                                                    </td>
                                                    <td v-if="subjectId == list.id" class="bg-gray-100 pl-3 w-1/5">
                                                        <input type="text" v-model="model2.Subject_Code"
                                                            :id="'subject-edit-${list.id}'"
                                                            @keydown.enter="updateSubject()"
                                                        class="border-0 py-4 whitespace-nowrap text-sm text-sky-600 font-medium text-gray-900 bg-gray-100 h-px w-full"/>
                                                    </td>
                                                    <td v-else @click="setToEditing(list.id)"
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                    >
                                                            <span v-html="highlightMatches(list.Subject_Code)"></span>
                                                    </td>
                                                    <td v-if="subjectId == list.id" class="bg-gray-100 pl-3 w-1/6">
                                                        <input type="text" v-model="model2.Subject_Type"
                                                            :id="'subject-edit-${list.id}'"
                                                            @keydown.enter="updateSubject()"
                                                        class="border-0 py-4 whitespace-nowrap text-sm text-sky-600 font-medium text-gray-900 bg-gray-100 h-px w-full"/>
                                                    </td>
                                                    <td v-else @click="setToEditing(list.id)"
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                    >
                                                            <span v-html="highlightMatches(list.Subject_Type)"></span>
                                                    </td>
                                                    <td v-if="subjectId == list.id" class="bg-gray-100 pl-3 w-1/12">
                                                        <input type="text" v-model="model2.Units"
                                                            :id="'subject-edit-${list.id}'"
                                                            @keydown.enter="updateSubject()"
                                                        class="border-0 py-4 whitespace-nowrap text-sm text-sky-600 font-medium text-gray-900 bg-gray-100 h-px w-8/12"/>
                                                    </td>
                                                    <td v-else @click="setToEditing(list.id)"
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                    >
                                                            <!-- {{ list.Units }} -->
                                                            <span v-html="highlightMatches(list.Units)"></span>
                                                    </td>
                                                    <td v-if="subjectId == list.id" class="bg-gray-100 w-1/12">
                                                        <button
                                                            class="px-3 py-4 text-sm font-medium text-sky-600 hover:text-sky-900"
                                                            @click="updateSubject()"
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
                                                    <td v-if="subjectId == list.id" class="bg-gray-100 w-1/12">
                                                        <a
                                                            href="#" @click="() => cancelEdit()"
                                                            class="pl-5 py-4 whitespace-nowrap text-sm font-medium text-red-600 hover:text-red-900"
                                                            >Cancel</a>
                                                    </td>
                                                    <td v-else
                                                        class="px-3 py-4 whitespace-nowrap indent-2 text-left text-sm font-medium"
                                                    >
                                                        <a
                                                            href="#" @click="() => deleteSubject(list.id)"
                                                            class="text-red-600 hover:text-red-900"
                                                            >Delete</a
                                                        >
                                                    </td>
                                                </tr>
                                                <tr class="EmptySubjects" v-else>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">No Record of Subject</td>
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
import { ref, computed } from 'vue';
import { useVuelidate } from '@vuelidate/core';
import { required, numeric, integer, minValue, maxValue, alpha } from '@vuelidate/validators';

import APIController from '../controllers/api'

export default {
    name: 'Subjects',
    setup () {
        const initialState = {
            Subject_Code: '',
            Subject_Name: '',
            Subject_Type: '',
            Units: '',
        }
        const model = ref({...initialState});

        const rules = computed(() => {
            return {
                Subject_Code: { required },
                Subject_Name: { required, alpha },
                Subject_Type: { required },
                Units: { required, numeric, integer, minValue: minValue(1), maxValue: maxValue(20) }
            }
        })

        const v$ = useVuelidate(rules, model)

        const model2 = ref([]);
        const searchQuery = ref("");

        const subjectList = ref({});
        const subjectId = ref(false);

        const reset = () => {
            model.value = {...initialState};
        }
        const fetchSubjects = async () => {
            subjectList.value = await APIController.FetchSubjects();
        }

        // const toggleSubject = (id = false) => {
        //     subjectId.value = false;

        //     if (id) {
        //         subjectId.value = id;
        //         GetSubject();
        //     }
        // }
        
        const GetSubject = async () => {
            model2.value = await APIController.FetchSubject(subjectId.value);
        }

        const AddNewSubject = async () => {
            let tempSubject = await APIController.CreateSubject(model.value.Subject_Code, model.value.Subject_Name, model.value.Subject_Type, model.value.Units);
            if (tempSubject) {
                fetchSubjects(),
                reset();
            }
        }

        const updateSubject = async () => {
            let tempSubject = await APIController.UpdateSubject(model2.value.Subject_Code, model2.value.Subject_Name, model2.value.Subject_Type, model2.value.Units, subjectId.value);
            if (tempSubject) {
                fetchSubjects(),
                GetSubject();
                subjectId.value = false;
            }
        }

        const deleteSubject = async id => {
            const success = await APIController.DeleteSubject(id);

            if (success) {
                fetchSubjects();
            }
        }

        const searchedSubjects = computed(() => {
            return subjectList.value.filter((list) => {
                return (
                list.Subject_Name
                    .toLowerCase()
                    .indexOf(searchQuery.value.toLowerCase()) != -1 ||
                list.Subject_Code
                    .toLowerCase()
                    .indexOf(searchQuery.value.toLowerCase()) != -1 ||
                list.Subject_Type
                    .toLowerCase()
                    .indexOf(searchQuery.value.toLowerCase()) != -1 ||
                list.Units
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
            subjectId.value = list;
            GetSubject();
            // this.$refs.search.focus();
            setTimeout(()=> {
                document.getElementById('subject-edit-${list.id}').focus()
            }, 1);
        }
        
        function cancelEdit(){
            subjectId.value = false;
        }

        return {
            model,
            model2,
            subjectList,
            fetchSubjects,
            AddNewSubject,
            deleteSubject,
            GetSubject,
            updateSubject,
            // toggleSubject,
            subjectId,
            reset,
            searchedSubjects,
            searchQuery,
            highlightMatches,
            setToEditing,
            cancelEdit,
            v$,
            // Subject_Code,
            // Subject_Name,
            // Subject_Type,
            // Units,
            // rules
        }
    },
    mounted () {
        if (this.subjectId != false){
            this.GetSubject();
        }
        this.fetchSubjects();
        // this.v$.$validate();
    },
    methods: {
        postAjaxForm () {
            this.v$.$reset();
        }
    },
    
}
</script>
