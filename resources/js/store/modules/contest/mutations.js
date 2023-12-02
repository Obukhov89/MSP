export default {
    addAllContests(state, payload){
        state.arrContest = payload
    },

    setItemCon(state, {key, payload}){
        state[key]= payload
    },

    changeItem(state, payload){
        console.log(payload)
        if (payload === 'exist')
        {
            state.nameContest = '';
            state.styleId = 0;
        }else {
            state.contestId = 0;
            state.styleId = 0;
        }
    }
}
