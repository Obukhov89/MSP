import {createStore} from "vuex/dist/vuex.mjs";

const store = createStore({
    state:{
        idAuthor: '',
        authorName: '',
        login: '',
        books: []
    },
    getters:{},
    actions:{
    //    экшн для входа
        login({commit}, payload){
            commit('login', payload)
        }
    },
    mutations:{
        //мутация входа пользователя
        login(state, payload) {
            state.idAuthor = payload.idAuthor;
            state.login = payload.login
            state.authorName = payload.authorName
            state.books = payload.books
         }
    },
})

export default store
