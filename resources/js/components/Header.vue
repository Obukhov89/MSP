<template>
    <div v-if="isAdmin" class="adminBtn">
        <button @click="pushAdmin">Панель андминистратора</button>
    </div>
    <div class="container header">
        <div class="header__block">
            <p class="header__block-title">Платон мне друг...</p>
            <img class="rk" src="../../../public/img/rk.jpg"/>
            <li class="header-list">Конкурс «Рябина на коньяке»</li>
            <li class="header-list">Приглашение на конкурс</li>
            <li class="header-list">Произведения номинации «Проза»</li>
            <li class="header-list">Произведения номинации «Поэзия»</li>
        </div>

        <div class="header__logo">
            <div class="logo-container header__content">
                <h1 class="header__title">Портал Международного Союза писателей "Новый Современник"</h1>
                <div class="header__group">
                    <img class="logo" src="../../../public/img/logo.png"/>
                    <LoginForm/>
                </div>
                <h1 class="header__title">При содействии литературного фонда имени Сергея Есенина</h1>
            </div>
            <div id="navbar">
                <ul class="navbar__list">
                    <li> <button class="li-btn" @click="goHomePage"> Главная</button></li>
                    <li> <button  class="li-btn">Новости и объявления</button></li>
                    <li> <button  class="li-btn"> Круглый стол</button></li>
                    <li> <button  class="li-btn"> Лента рецензий</button></li>
                    <li> <button  class="li-btn"> Ленты форумов</button></li>
                    <li> <button  class="li-btn"> Обзоры и итоги конкурсов</button></li>
                    <li> <button  class="li-btn"> Диалоги, дискуссии, обсуждения</button></li>
                    <li> <button  class="li-btn"> Избранные произведения</button></li>
                    <li> <button  class="li-btn"> Литобъединения и союзы писателей</button></li>
                    <li> <button  class="li-btn"> Литературные салоны, гостинные, студии, кафе</button></li>
                    <li> <button  class="li-btn"> Kонкурсы и премии</button>    </li>
                    <li> <button  class="li-btn"> Проекты критики</button></li>
                    <li> <button  class="li-btn"> Новости Литературной сети</button></li>
                    <li> <button  class="li-btn"> Журналы</button></li>
                    <li> <button  class="li-btn"> Издательские проекты</button></li>
                    <li> <button  class="li-btn"> Издать книгу</button></li>
                </ul>
            </div>
        </div>

        <div class="header__block">
            <p class="header__block-title">Дежурный писатель</p>
            <img class="rk" src="../../../public/img/deg-pisatel.jpg"/>
            <li class="header-list">Мысли, афоризмы и цитаты о писательском труде</li>
            <li class="header-list">Привычки и навыки, помогающие нам в писательском труде</li>
            <li class="header-list">Золотые правила писателей</li>
        </div>
    </div>
</template>

<script>
import router from "../router";
import LoginForm from "./LoginForm.vue";
import {mapActions, mapGetters} from "vuex/dist/vuex.mjs";
import displayingElements from "../store/modules/displayningElements/displayingElements";

export default {
    name: "Header",
    components: {LoginForm},

    computed:{
        ...mapGetters('auth', ['isAdmin'], 'displayingElements', ['modalRegistaration']),

        isAdmin(){
            return this.$store.getters['auth/isAdmin']
        },

        state(){
            return this.$store.state.modalRegistration
        },
    },

    methods: {
        ...mapActions('auth', ['login', 'adminEnter'], 'composition', ['counterBooks'],
            'contest', ['addAllContests'], 'displayingElements', ['modalRegistration']),


        pushAdmin(){
            this.$store.dispatch('hideNews')
            router.push({path: '/admin'})
        },

        goHomePage(){
            router.push({path: '/'})
            this.$store.dispatch('displayingElements/showNews', true)
        }
    }
}
</script>

<style scoped>

.adminBtn{
    height: 45px;
    background-color: #3b5e97;
    border: 2px solid gray;
}

.logo-container {
    /* width: 800px; */
    align-items: center;
    text-align: center;
    margin: 0 auto;

}

.header {
    /* height: 100px; */
    background-color: #C6DCF2;
    display: flex;
    /* background-blend-mode: luminosity; */
    gap: 30px;
    justify-content: space-around;
    padding-top: 10px;
}

.header__title {
    border: 1px solid #3b5e97;
    background-color: #3b5e97;
    /* text-align: center; */
    text-transform: none;
    align-items: center;
    margin: 0 auto;
}

.header__group {
    display: flex;
    justify-content: space-between;

    align-items: center;
    margin: 0 auto;
}

.header__subtitle {

    text-align: center;
    letter-spacing: 1px;
}

.logo {
    /* margin-left: 100px; */
    /* margin-top: 10px; */
    width: 550px;
    /* height: 80px; */
}

.autorisation {
    padding-top: 5px;
    width: 300px;
    font-size: 12px;
}

.autorisation__title {
    margin: 0;
    background-color: #3b5e97;
}

.autorisation__subtitle {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-left: 40px;

}

.account_group {
    float: right;
    margin: 40px 100px 0 0;
}

.content {
    position: relative;
    top: -287px;
    left: 320px;
    width: 1400px;
}

.form_text {
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    line-height: 26px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: gray;
}
#navbar {
    background-color: #C6DCF2;
    margin: 0 auto;
}

.li-btn{
    background-color: #abcdf066;
    width: 100%;
    height: 30px;
    border: 1px solid white;
    font-size: 12px;
    /* padding: 0 5px; */
    cursor: pointer;
    font-weight: 600;
    color: #3b5e97;
    border-radius: 5px;
}

.link-block-title--left{
    text-align: start;
    letter-spacing: -0.2px;
    font-size: 12px;
}

.link-block-subtitle {
    background-color: #C6DCF2;
    /* border-bottom: 1px solid white; */
    margin: 1px 1px 1px 1px;
    text-align: left;
    color: #3b5e97;
    font-size: 12px;
    padding: 2px;
    line-height: 1.5em;
    /* font-weight: 400; */
}

</style>
