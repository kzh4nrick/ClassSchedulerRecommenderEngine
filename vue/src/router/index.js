import {createRouter, createWebHistory} from "vue-router";
import Dashboard from '../views/Dashboard.vue'
import Courses from '../views/Courses.vue'
import Subjects from '../views/Subjects.vue'
import Faculty from '../views/Faculty.vue'
import Classrooms from '../views/Classrooms.vue'
import DefaultLayout from '../components/deflayout.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'

const routes = [
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
        path: '/',
        redirect: '/dashboard',
        component: DefaultLayout,
        children: [
            {path: '/dashboard', name: 'Dashboard', component: Dashboard},
            {path: '/courses', name: 'Courses', component: Courses},
            {path: '/subjects', name: 'Subjects', component: Subjects},
            {path: '/faculty', name: 'Faculty', component: Faculty},
            {path: '/classrooms', name: 'Classrooms', component: Classrooms}
        ]
    }
];

const router = createRouter( {
    history: createWebHistory(),
    routes
})

export default router;