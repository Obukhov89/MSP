export default {
    setIdContest({commit}, payload){
        commit('setIdContest', payload)
    },

    addId({commit}, payload){
        commit('addId', payload)
    },

    addNewCompos({commit}, {key, payload}){
        commit('addNewComposKey', {key, payload})
    },

    delItem({commit}, payload){
        commit('delItem', payload)
    }
}
