<template>
    <div class="container">
        <h3 class="contest_title">Список актуальных конкурсов</h3>
        <table class="table contest_list">
            <thead>
            <td>№</td>
            <td>Название конкурса</td>
            <td>Стили произведений <br> участвующих в конкурсе</td>
            <td>Дата начала</td>
            <td>Дата окончания</td>
            <td>Действия</td>
            </thead>
            <tbody>
                <tr v-for="(item, numb) in getAllContests" :key="item.idContest">
                    <td>{{ numb + 1 }}</td>
                    <td>{{ item.nameProject }}</td>
                    <td>{{ item.name_form }}</td>
                    <td>{{ item.date_start }}</td>
                    <td> {{ item.date_end }} </td>
                    <td><button @click="appContest(item.idContest)" class="agreeBtn">Принять участие</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div v-if="getApplicationContest">
        <ApplicationContest/>
    </div>

</template>

<script>
import  {mapGetters, mapActions} from "vuex/dist/vuex.mjs";
import ApplicationContest from "../Modals/ApplicationContest.vue";

export default {
    name: "TableContests",
    components: {ApplicationContest},
    computed:{
        ...mapGetters('contest', ['getAllContest', 'applicationContest']),

        getAllContests(){
            return this.$store.getters['contest/getAllContest']
        },

        getApplicationContest(){
            return this.$store.getters['displayingElements/applicationContest']
        }
    },

    methods: {

        ...mapActions('displayingElements', ['applicationContest']),

        appContest(item){
            console.log(item)
            this.$store.dispatch('displayingElements/applicationContest', true);
            this.$store.dispatch('forContest/setIdContest', item)
        }
    }
}
</script>

<style scoped>
.container{
    margin-left:20px;
    width: 980px;
}

.contest_title{
    background-color: #3b5e97;
}

.table{
    width: 100%;
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

.agreeBtn{
    width: 140px;
    height: 45px;
    border: none;
    border-radius: 5px;
    background-color: #3b5e97;
    color: #eeeeee;
    font-family: Montserrat, sans-serif;
    font-size: 14px;
}
</style>
