export default {

    login({commit}, payload){
        commit('login', payload)
    },

    adminEnter({commit}, payload){
        commit('isAdmin', payload)
    }
}
