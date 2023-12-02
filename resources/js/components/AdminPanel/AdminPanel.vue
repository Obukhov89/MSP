<template>
    <div id="adminpanel">
        <h3 class="adminpanel__name">ИМЯ ПОЛЬЗОВАТЕЛЯ</h3>
        <div class="adminpanel__title">
            <div class="li-btn" @click="setActive('tab-1')">Управление регистрацией</div>
            <div class="li-btn" @click="setActive('tab-2')">Управление рекламой</div>
            <div class="li-btn" @click="setActive('tab-3')">Управление сообществами</div>
        </div>
        <div class="adminpanel__title2">
            <div class="li-btn" @click="setActive('tab-4')">Управление правами пользователя</div>
            <div class="li-btn" @click="setActive('tab-5')">Управление новостями</div>
            <div class="li-btn" @click="setActive('tab-6')">Управление конкурсами</div>
        </div>
        <div v-show="isActive('tab-1')">
            <TableRequest/>
        </div>
        <div class="adminpanel__window" v-show="isActive('tab-2')">
            <div class="adminpanel__text">
                <h1>Управление рекламой</h1>
            </div>
        </div>
        <div class="adminpanel__window" v-show="isActive('tab-3')">
            <div class="adminpanel__text">
                <h1>Управление сообществами</h1>
            </div>
        </div>
        <div class="adminpanel__window" v-show="isActive('tab-4')">
            <div class="adminpanel__text">
                <h1>Управление правами пользователя</h1>
            </div>
        </div>
        <div class="adminpanel__window" v-show="isActive('tab-5')">
            <div class="adminpanel__text">
                <h1>Управление новостями</h1>
            </div>
        </div>
        <div v-show="isActive('tab-6')">
            <ContestList/>
        </div>
    </div>

</template>

<script>


import TableRequest from "./TableRequest.vue";
import ContestList from "./ContestList.vue";

export default {
    name: "AdminPanel",
    components: {ContestList, TableRequest},
    data: () => ({
        activeTab: 'tab-1',
    }),
    methods: {
        setActive(tab) {
            this.activeTab = tab
        },
        isActive(tab) {
            return this.activeTab === tab;
        },

    },


}
</script>

<style scoped>
#adminpanel {
    width: 970px;
    background-color: #C6DCF2;
    margin-left: 2rem;
    /*margin: 0 auto;*/
}

.adminpanel__name {
    text-align: center;
    margin: 0;
    border: 1px solid;
    background-color: #3b5e97;
    font-size: 20px;
    padding: 5px;
}

.adminpanel__title2 {
    display: flex;
    padding: 0;
    justify-content: space-between;
}

.adminpanel__title {
    display: flex;
    padding: 0;
    justify-content: space-between;
}

.adminpanel__window {
    height: 10vh;
    border: 2px solid white;
}

.adminpanel__text h1 {
    color: #000;
}

.li-btn {
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

.tableRequest {
    width: 100%;
    padding-top: 3rem;
}

.tableRequest tr {
    text-align: center;
}

.acceptBtn {
    width: 180px;
    height: 45px;
    background: #3b5e97;
    border: none;
    color: white;
    font-size: 16px;
    border-right: 3px;
}

.rejectBtn {
    width: 180px;
    height: 45px;
    background: red;
    border: none;
    color: white;
    font-size: 16px;
    border-right: 3px;
}
</style>
