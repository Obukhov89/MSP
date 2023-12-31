import {createStore} from "vuex/dist/vuex.mjs";
import auth from './modules/auth/auth.js'
import displayingElements from "./modules/displayningElements/displayingElements.js";
import composition from "./modules/composition/composition.js";
import contest from "./modules/contest/contest.js";
import forContest from "./modules/forContest/forContest.js";

const store = createStore({
    state:{},
    getters:{},
    actions:{

        showModalRegistration({commit}, payload){
            commit('showModalRegistration', payload)
        },

        showModalEditComposition({commit}, payload){
          commit('showModalEditComposition', payload)
        },

        closeModalEditComposition({commit}, payload){
            commit('closeModalEditComposition', payload)
        },

        closeModalRegistration({commit}, payload){
            commit('closeModalRegistration', payload)
        },

    },
    mutations:{

        showModalRegistration(state, payload){
            state.modalRegistration = payload
        },

        closeModalRegistration(state, payload) {
            state.modalRegistration = payload
        },

        showModalEditComposition(state, payload) {
            state.modalEditComposition = payload
            },

        closeModalEditComposition(state, payload) {
            state.modalEditComposition = payload
        },

    },
    modules:{
        auth,
        displayingElements,
        composition,
        contest,
        forContest
    }
})

export default store
