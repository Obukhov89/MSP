export default {

    hideNews(state, payload){
        state.blockNews = payload
    },

    showNews(state, payload){
        state.blockNews = payload
    },

    visibleAdd(state, payload){
        state.addModalComposition = payload
    },

    hideAdd(state, payload){
        state.addModalComposition = payload
    },

    visibleEdit(state, payload) {
        state.modalEditComposition = payload
    },

    closeModalEditComposition(state, payload) {
        state.modalEditComposition = payload
    },
}
