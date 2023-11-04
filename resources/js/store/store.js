import {createStore} from "vuex/dist/vuex.mjs";
import auth from './modules/auth/auth.js'
import displayingElements from "./modules/displayningElements/displayingElements.js";

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
    }
})

export default store
