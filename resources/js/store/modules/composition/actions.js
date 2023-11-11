export default {
    counterBooks({commit}, payload){
        commit('counterBooks', payload)
    },

    allBooks({commit}, payload){
      commit('allBooks', payload)
    },

    addNewBook({commit}, payload){
        commit('addNewBook', payload)
    }
}
