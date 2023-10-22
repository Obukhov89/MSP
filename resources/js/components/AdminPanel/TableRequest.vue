<template>
    <table class="tableRequest">
        <tr v-for="item in arrRequest" :key="item.idRequest">
            <td>{{ item.idRequest }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.role }}</td>
            <td>{{ item.about }}</td>
            <td>
                <button class="acceptBtn" @click="saveRequest">Принять запрос</button>
            </td>
            <td>
                <button class="rejectBtn">Отклонить запрос</button>
            </td>
        </tr>
    </table>
</template>

<script>
import axios from "axios";

export default {
    name: "TableRequest",

    data() {
        return ({
                arrRequest: []
            }
        )
    },

    methods:{
        getTurn(){
            axios.get('/getTurnRequest').then((request) => {
                request.data.forEach((item, index) => {
                    this.arrRequest.push(item);
                })
            })
        },
        saveRequest(){
            console.log('ok');
            axios.post('/saveRequest').then((request) => {
                console.log(request.data);
            })
        }
    },
    beforeMount() {
        this.getTurn()
    }
}
</script>

<style scoped>
#adminpanel {
    width: 1000px;
    background-color: #C6DCF2;
    margin: 0 auto;
}

.adminpanel__name{
    text-align: center;
    margin: 0;
    border: 1px solid;
    background-color: #3b5e97;
    font-size: 20px;
    padding: 5px;
}

.adminpanel__title2{
    display: flex;
    padding: 0;
    justify-content: space-between;
}

.adminpanel__title{
    display: flex;
    padding: 0;
    justify-content: space-between;
}
.adminpanel__window{
    height: 10vh;
    border: 2px solid  white;
}
.adminpanel__text h1{
    color: #000;
}

.li-btn{
    background-color: #abcdf066;
    width: 100%;
    height: 40px;
    border: 1px solid white;
    font-size: 12px;
    padding: 0 5px;
    cursor: pointer;
    font-weight: 600;
    color: #3b5e97;
    border-radius: 5px;
    border-top: solid 1px #e3e3e3;
    padding: 5px;
    font-size: 13px;
    width: -webkit-fill-available;
    text-align: center;
}

.tableRequest{
    width: 900px;
    padding-top: 3rem;
}

.tableRequest tr{
    text-align: center;
}

.acceptBtn{
    width: 180px;
    height: 45px;
    background: #3b5e97;
    border: none;
    color: white;
    font-size: 16px;
    border-right: 3px;
}

.rejectBtn{
    width: 180px;
    height: 45px;
    background: red;
    border: none;
    color: white;
    font-size: 16px;
    border-right: 3px;
}
</style>
