export default {

    allBooks(state, payload){
        state.books = payload.book
        state.countBooks = payload.countBooks
    },

    addNewBook(state, payload) {
        console.log(state.books)
        state.books.push({'textId': payload.textId, 'textTitle': payload.textTitle})
    },

    delComposition(state, payload) {
        state.books = state.books.filter(item => item.textId !== payload)
    }
}
