export default {
    setIdContest(state, payload){
        state.idContest = payload
    },

    addId(state, payload){
        state.idComposition = payload
    },

    addNewComposKey(state, {key, payload}){
        state[key]= payload
    },

    delItem(state, payload){
        if (payload === 'file'){
            state.textComposition = ''
        }else {
            state.file = null
        }
    }
}
