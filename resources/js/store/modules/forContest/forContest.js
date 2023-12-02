import getters from './getters.js';
import state from './state.js';
import actions from './actions.js'
import mutations from './mutations.js'

export default {
    namespaced: true,
    getters,
    state,
    actions,
    mutations
}
