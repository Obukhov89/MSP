export default {

    login(state, payload) {
        state.idAuthor = payload.idAuthor;
        state.login = payload.login
        state.authorName = payload.authorName
        state.books = payload.books
    },

    isAdmin(state, payload){
        state.isAdmin = payload
    },
}
