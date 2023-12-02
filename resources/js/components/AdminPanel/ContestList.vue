<template>
    <div class="btn_cont">
        <button @click="showModalContest" class="manageBtn">Добавить конкурс</button>
    </div>

    <table class="table contest_list">
        <thead>
        <td>№</td>
        <td>Название конкурса</td>
        <td>Стили произведений <br> участвующих в конкурсе</td>
        <td>Дата начала</td>
        <td>Дата окончания</td>
        </thead>
        <tbody>
        <tr v-for="(item, numb) in getAllContests" :key="item.idContest">
            <td>{{ numb + 1 }}</td>
            <td>{{ item.nameProject }}</td>
            <td>{{ item.name_form }}</td>
            <td>{{ item.date_start }}</td>
            <td> {{ item.date_end }} </td>
        </tr>
        </tbody>
    </table>
    <div v-if="getModalContest">
        <NewContestModal/>
    </div>

</template>

<script>
import NewContestModal from "../Modals/NewContestModal.vue";
import {mapGetters, mapActions} from "vuex/dist/vuex.mjs";
export default {
    name: "ContestList",
    components: {NewContestModal},
    data(){
    },

    computed:{
        ...mapGetters('displayingElements', ['getModalContest'], 'contest', ['getAllContest']),

        getModalContest: function (){
            return this.$store.getters['displayingElements/getModalContest']
        },

        getAllContests(){
            return this.$store.getters['contest/getAllContest']
        },
    },

    methods:{

        ...mapActions('displayingElements', ['modalContest']),

        showModalContest(){
            this.$store.dispatch('displayingElements/modalContest', true)
        }
    }
}
</script>

<style scoped>

.table{
    width: 100%;
    margin-top: 1rem;
    border-collapse: collapse;
}

.contest_list{
    text-align: center;
}

.contest_list thead {
    height: 80px;
}

.contest_list thead td{
    width: 150px;
    background-color: #3b5e97;
    color: #eeeeee;
}

.table td{
    border-bottom: 1px solid #777777;
}

.btn_cont{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-end;

}

.manageBtn {
    margin-top: 1rem;
    width: 190px;
    height: 45px;
    background-color: #3b5e97;
    border: none;
    color: #eeeeee;
    font-size: 16px;
    font-family: 'Montserrat', sans-serif;
}

</style>
