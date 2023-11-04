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
    }
}
