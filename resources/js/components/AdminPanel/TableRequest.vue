<template>
    <table class="tableRequest">
        <tr v-for="item in arrRequest" :key="item.idRequest">
            <td>{{ item.idRequest }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.role }}</td>
            <td>{{ item.about }}</td>
            <td>
                <button class="acceptBtn" @click="saveRequest(item.idRequest)">Принять запрос</button>
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
        saveRequest(id){
            let idRequest = {'idRequest': id}
            axios.post('/saveRequest', idRequest).then((request) => {
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

.tableRequest td{
    border-bottom: 1px solid #718096;
   height: 80px;
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
    background: #9f4848;
    border: none;
    color: white;
    font-size: 16px;
    border-right: 3px;
}
</style>
