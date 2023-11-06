export default {

    login(state, payload) {
        state.idAuthor = payload.idAuthor;
        state.login = payload.login
        state.authorName = payload.authorName
        state.books = payload.books
        state.oldId = payload.oldId
    },

    isAdmin(state, payload){
        state.isAdmin = payload
    },
}
