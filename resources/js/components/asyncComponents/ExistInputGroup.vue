<template>
    <label class="labelFor" for="compositionSelect">Выберите желаемое произведение:</label>
    <select @change="setIdCompositions" id="compositionSelect" class="compositionInput" v-model="idComposition">
        <option v-for="item in arrBooks" :value="item.textId">{{ item.textTitle }}</option>
    </select>
</template>

<script>
import  {mapActions, mapGetters} from "vuex/dist/vuex.mjs";

export default {
    name: "ExistInputGroup",
    data(){
        return{
            idComposition: 0
        }
    },

    computed:{
        ...mapGetters('composition', ['getBooks']),

        arrBooks(){
            return this.$store.getters['composition/getBooks']
        }
    },

    methods:{
        ...mapActions('forContest', ['addId']),
        setIdCompositions(){
            this.$store.dispatch('forContest/addId', this.idComposition)
        }
    }
}
</script>

<style scoped>

.labelFor{
    margin: 1rem;
    color: #3b5e97;
}

.compositionInput{
    width: 350px;
    padding-left: 5px;
    height: 35px;
    border: 1px solid #707e9b;
}
</style>
