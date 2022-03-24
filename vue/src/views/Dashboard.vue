<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-100">
    <body class="h-full">
    ```
  -->

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Class Scheduler Recommender Engine
            </h1>
        </div>
    </header>
    <main>
        <div class="max-w-full py-5 sm:px-6 lg:px-12">
            <form class="form" @submit.prevent="AddSchedule()">
            <div class="grid grid-cols-12 gap-2">
                <div class="col-span-4">
                    <select
                        v-model="v$.selectedCollege.$model"
                        @keyup="v$.selectedCollege.$touch()"
                        @blur="v$.selectedCollege.$touch()"
                        required
                        @change="fetchCourses()"
                        class="invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max w-full text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    >
                        <option disabled value="" class="text-center">-- Select a College Department --</option>
                        <option v-for="list in collegeList"
                                v-bind="list.id"
                                :value="list.id"
                                class="text-sky-600 text-justify"
                                >
                                {{  list.College_Name + " - " + list.Campus }}
                        </option>
                    </select>
                </div>
                <div class="col-span-3">
                    <select
                        v-model="v$.selectedCourse.$model"
                        @keyup="v$.selectedCourse.$touch()"
                        @blur="v$.selectedCourse.$touch()"
                        required
                        class="invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max w-full text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    >
                        <option disabled value="" class="text-center">-- Select a Course --</option>
                        <option v-for="list in courseList"
                                :key="list.id"
                                :value="list.id"
                                class="text-sky-600 text-justify"
                                >
                                {{  list.Course_Name }}
                        </option>
                    </select>
                </div>
                <div class="col-span-2">
                    <select
                        v-model="v$.selectedYearLevel.$model"
                        @keyup="v$.selectedYearLevel.$touch()"
                        @blur="v$.selectedYearLevel.$touch()"
                        required
                        class="invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max w-full text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    >
                        <option disabled value="" class="text-center">-- Year Level --</option>
                        <option value="1y1s" class="text-sky-600 text-justify">1st year - 1st sem</option>
                        <option value="1y2s" class="text-sky-600 text-justify">1st year - 2nd sem</option>
                        <option value="2y1s" class="text-sky-600 text-justify">2nd year - 1st sem</option>
                        <option value="2y2s" class="text-sky-600 text-justify">2nd year - 2nd sem</option>
                        <option value="3y1s" class="text-sky-600 text-justify">3rd year - 1st sem</option>
                        <option value="3y2s" class="text-sky-600 text-justify">3rd year - 2nd sem</option>
                        <option value="3yms" class="text-sky-600 text-justify">3rd year - mid sem</option>
                        <option value="4y1s" class="text-sky-600 text-justify">4th year - 1st sem</option>
                        <option value="4y2s" class="text-sky-600 text-justify">4th year - 2nd sem</option>
                    </select>
                </div>
                <div class="col-span-1">
                    <select
                        v-model="v$.selectedBlock.$model"
                        @keyup="v$.selectedBlock.$touch()"
                        @blur="v$.selectedBlock.$touch()"
                        required
                        class="invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max w-full text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    >
                        <option disabled value="" class="text-center">--Block--</option>
                        <option value="A" class="text-sky-600 text-center">A</option>
                        <option value="B" class="text-sky-600 text-center">B</option>
                        <option value="C" class="text-sky-600 text-center">C</option>
                    </select>
                </div>
                <div class="ml-2 w-44 col-span-1">
                    <button
                        v-if="v$.$invalid"
                        disabled
                        type="submit"
                        class="cursor-not-allowed h-full border border-transparent w-full shadow-sm text-md font-black font-mono rounded-lg text-white bg-gradient-to-r from-pink-400/75 to-sky-400/75">
                        View Schedule
                    </button>
                    <button
                        v-else
                        type="submit"
                        class="h-full border border-transparent w-full shadow-sm text-md font-black font-mono rounded-lg text-white bg-gradient-to-r from-pink-500 to-sky-300 hover:from-pink-700 hover:to-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                        View Schedule
                    </button>
                </div>
                <div class="col-span-1"></div>
            </div>
            </form>
        </div>
        <div v-if="sched == false" class="max-w-full py-10 sm:px-24">
          <div class="border-4 border-dashed border-gray-200 rounded-lg h-96" />
        </div>
        <div v-else class="max-w-full mx-auto pb-6 sm:px-6 lg:px-12 grid grid-cols-4">
            <!-- Replace with your content -->
            <!-- :time-step="5"
                timeCellHeight=20 -->
            <div class="col-span-3 rounded-lg shadow-lg">
                <vue-cal class="rounded-lg"
                    selected-date="2022-08-01"
                    :time-from="7 * 60"
                    :time-to="21 * 60"
                    twelveHour="true"
                    hideTitleBar="true"
                    hideViewSelector="true"
                    >
                </vue-cal>
            </div>

            <div class="mt-9 ml-5 h-4/6 grid grid-cols-4 gap-2 shadow-lg overflow-hidden sm:rounded-lg bg-white sm:px-4 sm:py-3">
            <!-- <form class="form" @submit.prevent="AddSchedule()"> -->
                <div class="col-span-2">
                    <label
                        class="block text-sm text-center font-medium text-gray-700"
                    >Start Time
                    </label>
                    <input
                            v-model="x$.StartTime.$model"
                            @keyup="x$.StartTime.$touch()"
                            @blur="x$.StartTime.$touch()"
                            type="time"
                            min="07:00" max="21:00"
                            required
                            class="invalid:border-pink-500 w-full invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    />
                </div>
                <div class="col-span-2">
                    <label
                        class="block text-sm text-center font-medium text-gray-700"
                    >End Time
                    </label>
                    <input
                            v-model="x$.EndTime.$model"
                            @keyup="x$.EndTime.$touch()"
                            @blur="x$.EndTime.$touch()"
                            type="time"
                            min="07:00" max="21:00"
                            required
                            class="invalid:border-pink-500 w-full invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    />
                </div>
                <div class="col-span-4">
                    <select
                            v-model="x$.Day.$model"
                            @keyup="x$.Day.$touch()"
                            @blur="x$.Day.$touch()"
                            required
                            class="invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max w-full text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    >
                    <option disabled value="" class="text-center">Select a Day</option>
                        <option value="A" class="text-sky-600 text-center">Monday</option>
                        <option value="B" class="text-sky-600 text-center">Tuesday</option>
                        <option value="C" class="text-sky-600 text-center">Wednesday</option>
                        <option value="A" class="text-sky-600 text-center">Thursday</option>
                        <option value="B" class="text-sky-600 text-center">Friday</option>
                        <option value="C" class="text-sky-600 text-center">Saturday</option>
                        <option value="C" class="text-sky-600 text-center">Sunday</option>
                        
                    </select>
                </div>
                <div class="-mt-2 col-span-4">
                    <input 
                        v-model="major"
                        @change="isMajor"
                        class="ml-5 border-2 border-sky-600 focus:border-sky-500 inline-block focus:ring-sky-500" type="radio" required value="major"/>
                    <label class="inline-block ml-1 text-sm font-medium text-gray-700" for="major">Major</label>
                    <input
                        v-model="major"
                        @change="isNonMajor"
                        class="ml-3 border-2 border-sky-600 focus:border-sky-500 inline-block focus:ring-sky-500" type="radio" required value="non"/>
                    <label class="inline ml-1 text-sm font-medium text-gray-700" for="non">Non-Major</label>
                    <select
                            v-model="x$.Subject.$model"
                            @keyup="x$.Subject.$touch()"
                            @blur="x$.Subject.$touch()"
                            required
                            class="mt-0.5 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max w-full text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    >
                    <option disabled value="" class="text-center">Select a Subject</option>
                    <option v-for="list in subjectList"
                                :key="list.id"
                                :value="list.id"
                                class="text-sky-600 text-justify"
                                >
                                {{  list.Subject_Name }}
                    </option>
                    </select>
                </div>
                <div class="col-span-4">
                    <select
                            v-model="x$.Faculty.$model"
                            @keyup="x$.Faculty.$touch()"
                            @blur="x$.Faculty.$touch()"
                            required
                            class="invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max w-full text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    >
                    <option disabled value="" class="text-center">Select a Faculty</option>
                    <option v-for="list in facultyList"
                                :key="list.id"
                                :value="list.id"
                                class="text-sky-600 text-justify"
                                >
                                {{  list.Faculty_Name }}
                    </option>
                    </select>
                </div>
                <div class="col-span-4">
                    <select
                            v-model="x$.Classroom.$model"
                            @keyup="x$.Classroom.$touch()"
                            @blur="x$.Classroom.$touch()"
                            required
                            class="invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 h-max w-full text-sky-600 border-2 border-sky-500 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-sky-400 focus:border-sky-400 sm:text-sm"
                    >
                    <option disabled value="" class="text-center">Select a Classroom</option>
                    <option v-for="list in classroomList"
                                :key="list.id"
                                :value="list.id"
                                class="text-sky-600 text-justify"
                                >
                                {{  list.Building_No + list.Classroom_No }}
                    </option>
                    </select>
                </div>
                <div class="col-span-4">
                    <button
                            v-if="x$.$invalid"
                            disabled
                            class="cursor-not-allowed h-auto py-1.5 w-full border border-transparent w-full shadow-sm text-md font-bold font-mono rounded-lg text-white bg-gradient-to-r from-pink-400/75 to-sky-400/75 focus:outline-none focus:ring-2 focus:ring-offset-2">
                            Add Schedule
                    </button>
                    <button
                            v-else
                            class="h-auto py-1.5 w-full border border-transparent w-full shadow-sm text-md font-bold font-mono rounded-lg text-white bg-gradient-to-r from-pink-500 to-sky-300 hover:from-pink-700 hover:to-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Add Schedule
                    </button>
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</template>

<script>
import { ref, computed } from 'vue'
import { useVuelidate } from '@vuelidate/core';
import { required, minValue, maxValue } from '@vuelidate/validators';

import APIController from '../controllers/api'

import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'

export default {
    name: 'Dashboard',
    components: { VueCal },
    setup () {
        const sched = ref(false);
        let tempSchedule = ref([]);
        const schedule = ref([]);

        const initialState = {
            selectedCollege: '',
            selectedCourse: '',
            selectedYearLevel: '',
            selectedBlock: '',
        }

        const collegeList = ref([]);
        const courseList = ref([]);

        const model = ref({...initialState});

        const rules = computed(() => {
            return {
                selectedCourse: { required },
                selectedCollege: { required },
                selectedYearLevel: { required },
                selectedBlock: { required },
            }
        })

        const v$ = useVuelidate(rules, model)

        const subjectList = ref([]);
        const facultyList = ref([]);
        const classroomList = ref([]);

        const major = ref('');

        const initialState2 = {
            StartTime: '',
            EndTime: '',
            Day: '',
            Subject: '',
            Faculty: '',
            Classroom: '',
        }
        const model2 = ref({...initialState2});
        const rules2 = computed(() => {
            return {
                StartTime: { required },
                EndTime: { required },
                Day: { required },
                Subject: { required },
                Faculty: { required },
                Classroom: { required },
            }
        })

        const x$ = useVuelidate(rules2, model2)

        const fetchColleges = async () => {
            collegeList.value = await APIController.FetchColleges();
        }

        const fetchCourses = async () => {
            courseList.value = await APIController.FetchCoursesCollege(model.value.selectedCollege);
        }

        const AddSchedule = async () => {
            tempSchedule = await APIController.CreateSchedule(model.value.selectedCourse, model.value.selectedYearLevel, model.value.selectedBlock);
            if(tempSchedule){
                //fetchClassSchedules
                console.log(tempSchedule.id);
                sched.value = true;
            }
            else {
                schedule.value = await APIController.FetchSchedule(model.value.selectedCourse, model.value.selectedYearLevel, model.value.selectedBlock);
                console.log(schedule.value.id);
                sched.value = true;
            }
        }

        function viewSched () {
            // console.log(model);
            // AddSchedule();
        }

        const fetchMajorSubjects = async () => {
            subjectList.value = await APIController.FetchMajorSubjects(major.value, model.value.selectedCourse);
            console.log(model2.value.StartTime);
            console.log(model2.value.EndTime);
        }

        const fetchNotMajorSubjects = async () => {
            subjectList.value = await APIController.FetchNotMajorSubjects(model.value.selectedCourse);
            console.log(model.value.selectedCourse);
        }

        const fetchMajorFaculty = async () => {
            facultyList.value = await APIController.FetchMajorFaculties(model.value.selectedCollege);
            console.log(model.value.selectedCollege);
        }

        const fetchFaculties = async () => {
            facultyList.value = await APIController.FetchFaculties();
        }

        const fetchMajorClassrooms = async () => {
            classroomList.value = await APIController.FetchMajorClassrooms(model.value.selectedCollege);
            console.log(model.value.selectedCollege);
        }

        const fetchClassrooms = async () => {
            classroomList.value = await APIController.FetchClassrooms();
        }

        function isMajor () {
            fetchMajorSubjects();
            fetchMajorFaculty();
            fetchMajorClassrooms();
        }
        function isNonMajor () {
            fetchNotMajorSubjects();
            fetchFaculties();
            fetchClassrooms();
        }


        return {
            collegeList,
            courseList,
            fetchColleges,
            fetchCourses,
            v$,
            model,
            sched,
            viewSched,
            AddSchedule,
            tempSchedule,
            schedule,
            major,
            fetchMajorSubjects,
            subjectList,
            fetchNotMajorSubjects,
            fetchMajorFaculty,
            fetchFaculties,
            facultyList,
            classroomList,
            fetchClassrooms,
            fetchMajorClassrooms,
            isMajor,
            isNonMajor,
            x$,
            model2,
        }
    },
    mounted () {
        this.fetchColleges();
    }
}
</script>

<style>

.vuecal__cell--selected:before {border-color: rgba(123, 240, 255, 0.932);}
</style>
