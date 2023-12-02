<template>
    <div class="column">
        <label class="labelFor" for="name">Название конкурса</label>
        <select @change="setStore({'key': 'contestId', 'payload': this.contestId})"
                v-model="contestId" class="compositionInput" name="styles" id="name">
            <option v-for="(contest, number) in arrContest" :value="contest.idContest" :key="number">{{contest.contestName}}</option>
        </select>

        <label class="labelFor" for="login">Дата начала:</label>
        <input class="inputReg" id="login"
               @change="setStore({'key': 'dateStart', 'payload': this.dateStart})" type="date" v-model="dateStart">

        <label class="labelFor" for="nick">Дата окончания:</label>
        <input class="inputReg" id="nick" type="date"
               @change="setStore({'key': 'dateEnd', 'payload': this.dateEnd})" v-model="dateEnd">
    </div>
    <div class="column">
        <label class="labelFor" for="style">Форма произведений:</label>
        <select v-model="styleId" class="compositionInput"
                @change="setStore({'key': 'styleId', 'payload': this.styleId})" name="styles" id="style">
            <option v-for="(style, number) in arrStyles" :value="style.idStyle" :key="number">
                {{style.styleName}}</option>
        </select>

        <label class="labelFor" for="priceComposition">Стоимость размещения:</label>
        <input class="inputReg" id="priceComposition" type="number"
               @change="setStore({'key': 'priceContest', 'payload': this.priceContest})" v-model="priceContest">
    </div>
</template>

<script>
import axios from "axios";
import {mapActions} from "vuex/dist/vuex.mjs";

export default {
    name: "ExConInpts",

    data(){
        return{
            styleId: 0,
            arrStyles: [],
            priceContest: 0,
            contestId: 0,
            arrContest: [],
            dateStart: '',
            dateEnd: '',
            name: '',
        }
    },

    methods: {
        ...mapActions('contest', ['setItemCon']),

        getStyles(){
            axios.get('/getFormComposition').then((response) => {
                response.data.forEach((item) => {
                    this.arrStyles.push({idStyle : item.id, styleName: item.name_form})
                })
            })
        },

        getNameContests(){
            axios.get('/getNameContests').then((response) => {
                response.data.forEach((item) => {
                    this.arrContest.push({idContest: item.id, contestName: item.nameProject})
                })

            })
        },

        setStore(key){
            this.$store.dispatch('contest/setItemCon', key)
        }
    },

    beforeMount() {
        this.getStyles()
        this.getNameContests()
    }
}
</script>

<style scoped>
.compositionInput{
    width:360px;
    padding-left: 5px;
    height: 35px;
    border: 1px solid #707e9b;
    margin-left: 1rem;
    border-radius: 5px;
}

.labelFor{
    margin: 1rem;
    color: #3b5e97;
}

.inputReg{
    width: 350px;
    height: 35px;
    border: 1px solid #707e9b;
    margin-left: 1rem;
    border-radius: 5px;
    padding-left: 10px;
}

.column{
    height: 470px;
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
}

</style>
