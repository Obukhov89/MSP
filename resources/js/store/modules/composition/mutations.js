export default {

    allBooks(state, payload){
        state.books = payload.book
        state.countBooks = payload.countBooks
    },

    addNewBook(state, payload) {

    }
}
