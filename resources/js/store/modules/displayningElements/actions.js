export default {

    hideNews({commit}, payload){
        commit('hideNews', payload)
    },

    showNews({commit}, payload){
        commit('showNews', payload)
    },

    visibleAdd({commit}, payload){
        commit('visibleAdd', payload)
    },

    hideAdd({commit}, payload){
        commit('hideAdd', payload)
    },

    visibleEdit({commit}, payload){
        commit('visibleEdit', payload)
    },

    closeModalEditComposition({commit}, payload){
        commit('closeModalEditComposition', payload)
    },

    modalContest({commit}, payload){
        commit ('modalContest', payload)
    },

    modalRegistration({commit}, payload){
        commit('modalRegistration', payload)
    },

    applicationContest({commit}, payload){
        commit('applicationContest', payload)
    }

}
