
import {createStore} from "vuex";
import axiosClient from "../axios";

const store = createStore({

    state: {
        user: {
            data: {
                name: 'Qwerty Asdfgh',
                email: 'secret@gmail.com',
                imageUrl:
                    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            },
            token: null,
        }
    },
    getters: {},
    actions: {
        saveSubject({ commit }, subject){
            let response;
            if (subject.id) {
                response = axiosClient
                    .put(`/subject/${subject.id}`, subject)
                    .then((res) => {
                        commit('setCurrentSubject', res.data)
                        return res;
                    });
            } else {
                response = axiosClient.post("/subject", subject).then((res) => {
                    commit('setCurrentSubject', res.data)
                    return res;
                });
            }
            return response;
        },
    },
    mutations: {
        setCurrentSubject: (state, subject) => {
            state.currentSubject.data = subject.data;
          },
        // saveSubject: (state, subject) => {
        //     state.subjects = [...state.subjects, subject.data];
        // },
        // updateSubject: (state, subject) => {
        //     state.subjects = state.subjects.map((s) => {
        //         if(s.id == subject.data.id) {
        //             return subject.data;
        //         }
        //         return s;
        //     });
        // }
    },
    modules: {}
})
export default store;