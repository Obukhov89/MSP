export default {
    addAllContests({commit}, payload){
        commit('addAllContests', payload)
    },

    setItemCon({commit}, {key, payload}){
        commit('setItemCon', {key, payload})
    },

    changeItem({commit}, payload){
        commit('changeItem', payload)
    }
}
