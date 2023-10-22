import {createStore} from "vuex/dist/vuex.mjs";

const store = createStore({
    state:{
        idAuthor: '',
        authorName: '',
        login: '',
        books: [],
        modalRegistration: false,
        isAdmin: false,
        visibleNews: true
    },
    getters:{},
    actions:{
    //    экшн для входа
        login({commit}, payload){
            commit('login', payload)
        },

        showModalRegistration({commit}, payload){
            commit('showModalRegistration', payload)
        },

        closeModalRegistration({commit}, payload){
            commit('closeModalRegistration', payload)
        },

        hideNews({commit}){
            commit('hideNews')
        },

        showNews({commit}){
            commit('showNews')
        },

        adminEnter({commit}, payload){
            commit('isAdmin', payload)
        }
    },
    mutations:{
        //мутация входа пользователя
        login(state, payload) {
            state.idAuthor = payload.idAuthor;
            state.login = payload.login
            state.authorName = payload.authorName
            state.books = payload.books
         },

        showModalRegistration(state, payload){
            state.modalRegistration = payload
        },

        closeModalRegistration(state, payload) {
            state.modalRegistration = payload
        },

        isAdmin(state, payload){
            state.isAdmin = payload
        },

        hideNews(state) {
            state.visibleNews = false
        },

        showNews(state) {
            state.visibleNews = true
        }

    },
})

export default store
