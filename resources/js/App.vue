<template>
    <div v-if="this.isAdmin" class="adminBtn">
        <button @click="pushAdmin">Панель андминистратора</button>
    </div>
    <div class="container header">
        <div class="header__block">
            <p class="header__block-title">Платон мне друг...</p>
            <img class="rk" src="../../public/img/rk.jpg"/>
            <li class="header-list">Конкурс «Рябина на коньяке»</li>
            <li class="header-list">Приглашение на конкурс</li>
            <li class="header-list">Произведения номинации «Проза»</li>
            <li class="header-list">Произведения номинации «Поэзия»</li>
        </div>

        <div class="header__logo">
            <div class="logo-container header__content">
                <h1 class="header__title">Портал Международного Союза писателей "Новый Современник"</h1>
                <div class="header__group">
                    <img class="logo" src="../../public/img/logo.png"/>
                    <form method="post" @submit.prevent="loginFunc" class="autorisation">
                        <h3 class="autorisation__title">Вход для авторов</h3>
                        <div class="autorisation__form">
                            <div>Логин
                                <input type="text" placeholder="" name="login" v-model="login">
                            </div>
                            <div>Пароль
                                <input type="password" placeholder="" name="password" v-model="password">
                            </div>
                        </div>
                        <div class="autorisation__subtitle">
                            <button class="autorisation__btn">Вход</button>
                            <input type="checkbox"> Запомнить меня
                        </div>
                        <p @click="showModal">Регистрация на портале</p>
                        <p href="">Забыли пароль?</p>
                    </form>
                </div>

                <!-- <p class="header__subtitle">конкурсы, публикации, критика, издания, справочники писателей</p> -->
                <h1 class="header__title">При содействии литературного фонда имени Сергея Есенина</h1>
            </div>
            <div id="navbar">
                <ul class="navbar__list">
                    <li> <button class="li-btn"> Главная</button></li>
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
            <img class="rk" src="../../public/img/deg-pisatel.jpg"/>
            <li class="header-list">Мысли, афоризмы и цитаты о писательском труде</li>
            <li class="header-list">Привычки и навыки, помогающие нам в писательском труде</li>
            <li class="header-list">Золотые правила писателей</li>
        </div>
    </div>
    <div class="container blocks">
        <div class="left-blocks">
            <div class="header__block left-block">
                <p class="header__block-title">Буфет. Истории за нашим столом</p>
                <img class="rk" src="../../public/img/bufet.jpg"/>
                <li class="header-list">ОКТЯБРЬСКИЕ ПОСИДЕЛКИ</li>
                <li class="header-list">Лучшие рассказчикив нашем Буфете</li>
            </div>

            <div class="header__block left-block">
                <p class="header__block-title">Сергей Гамаюнов (Черкесский)</p>
                <img class="rk" src="../../public/img/Sergey.jpg"/>
                <li class="header-list">В Прощенное воскресенье</li>
            </div>

            <div class="header__block left-block">
                <p class="header__block-title">Конкурсы на призы Литературного фонда имени Сергея Есенина</p>
                <img class="rk" src="../../public/img/priz-lf1.jpg"/>
                <li class="header-list">Литературный конкурс "Рассвет"</li>
            </div>
            <div class="link-block left-block">
                <img class="rk" src="../../public/img/r-u.jpg"/>
            </div>
            <div class="link-block left-block">
                <p class="link-block-title">Английский клуб</p>
                <li class="link-block-list">&#9658; Положение о клубе</li>
                <li class="link-block-list">&#9658; Зал Прозы</li>
                <li class="link-block-list">&#9658; Зал Поэзии</li>
                <li class="link-block-list">&#9658; Английская дуэль</li>
                <li class="link-block-list">&#9658; Форум клуба</li>
                <li class="link-block-list">&#9658; Атрибутика клуба</li>
                <li class="link-block-list">&#9658; Архив клуба</li>
                <li class="link-block-list">&#9658; Бар "За углом"</li>
            </div>
            <div class="link-block left-block">
                <img class="rk" src="../../public/img/platon-grakov.jpg"/>
            </div>
            <div class="link-block left-block">
                <img class="rk" src="../../public/img/reg.jpg"/>
            </div>
            <div class="link-block left-block">
                <img class="rk" src="../../public/img/donat.jpg"/>
            </div>
            <div class="link-block left-block">
                <img class="rk" src="../../public/img/h-s1.jpg"/>
            </div>
            <div class="link-block left-block">
                <p class="link-block-title">Наши авторы</p>
                <li class="link-block-list">&#9658; Знакомьтесь: нашего полку прибыло!</li>
                <li class="link-block-list">&#9658; Первые шаги на портале</li>
                <li class="link-block-list">&#9658; Правила портала</li>
            </div>
            <div class="link-block left-block">
                <li class="link-block-list">&#9658; Размышления о литературном труде</li>
            </div>
            <div class="link-block left-block">
                <li class="link-block-list">&#9658; Новости и объявления</li>
                <li class="link-block-list">&#9658; Блиц-конкурсы</li>
                <li class="link-block-list">&#9658; Тема недели</li>
                <li class="link-block-list">&#9658; Диалоги, дискуссии, обсуждения</li>
                <li class="link-block-list">&#9658; С днем рождения!</li>
                <li class="link-block-list">&#9658; Клуб мудрецов</li>
                <li class="link-block-list">&#9658; Наши Бенефисы</li>
            </div>
            <div class="link-block left-block">
                <li class="link-block-list">&#9658; Книга предложений</li>
            </div>
            <div class="link-block left-block">
                <CitySelect class="link-block-title "></CitySelect>
            </div>
        </div>

        <router-view/>
        <div class="right-blocks">
            <div class="header__block right-block">
                <p class="header__block-title">Невеста почтенного возраста</p>
                <img class="rk" src="../../public/img/nevesta.jpg"/>
                <li class="header-list">Невеста почтенного возраста</li>
            </div>

            <div class="link-block right-block">
                <img class="rk" src="../../public/img/new.gif"/>
                <li class="link-block-list">&#9658; Устав, Положения, документы для приема</li>
                <li class="link-block-list">&#9658; Билеты МСП</li>
                <li class="link-block-list">&#9658; Форум для членов МСП</li>
            </div>

            <div class="link-block right-block">
                <p class="link-block-title">Состав МСП <br>"Новый Современник"</p>
                <li class="link-block-list">&#9658; Список Действительных членов МСП</li>
                <li class="link-block-list">&#9658; Список членов МСП</li>
                <li class="link-block-list">&#9658; Планета Рать</li>
            </div>

            <div class="link-block right-block">
                <p class="link-block-title">Региональные отделения МСП "Новый Современник"</p>
            </div>
            <div class="link-block right-block">
                <p class="link-block-title">Литературные объединения "Новый Современник"</p>
            </div>
            <div class="link-block right-block">
                <p class="link-block-title">Льготы для членов "Новый Современник"</p>
            </div>
            <div class="link-block right-block">
                <p class="link-block-title">Реквизиты и способы оплаты по МСП, издательству и порталу</p>
            </div>
            <div class="link-block right-block">
                <p class="link-block-title">Организация конкурсов и рейтинги</p>
            </div>
            <div class="link-block right-block">
                <img class="rk" src="../../public/img/redCat.jpg"/>
            </div>
            <div class="link-block right-block">
                <img class="rk" src="../../public/img/whoIsWho.jpg"/>
            </div>
            <div class="link-block right-block">
                <p class="link-block-title">Литературные объединения</p>
                <li class="link-block-list">&#9658; Союз писателей ДНР</li>
                <li class="link-block-list">&#9658; "Серебряная ладья"</li>
                <li class="link-block-list">&#9658; "Остров вдохновения"</li>
                <li class="link-block-list">&#9658; Союз литераторов <br> "Перо и слово"</li>
                <p class="link-block-title">Литературные организации и проекты по регионам России</p>
                <li class="link-block-list">&#9658; Воронежская область</li>
                <li class="link-block-list">&#9658; Рязанская область</li>
                <li class="link-block-list">&#9658; Рязанская область</li>
            </div>
            <div class="link-block right-block">
                <img class="rk" src="../../public/img/kab-kritikov.jpg"/>
            </div>
            <div class="link-block right-block">
                <img class="rk" src="../../public/img/u-kamina.jpg"/>
            </div>
            <div class="link-block right-block">
                <img class="rk" src="../../public/img/master-k.jpg"/>
            </div>
            <div class="link-block right-block">
                <p class="link-block-title">Наградные билеты МСП "Новый Современник"</p>
                <p class="link-block-title">Николай Вуколов</p>
                <p class="link-block-title">Валентина Тимонина</p>
                <p class="link-block-title">Сергей Малашко</p>
                <p class="link-block-title">Ол Томский</p>
                <p class="link-block-title">Дмитрий Долгов</p>
                <p class="link-block-title">Сергей Ворошилов</p>
            </div>
            <div class="link-block right-block">
                <p class="link-block-title">Как стать автором книги всего за 100 слов</p>
                <img class="rk" src="../../public/img/100slov.jpg"/>
                <p class="link-block-title">Положение о проекте</p>
                <p class="link-block-title">Общий форум проекта</p>
            </div>
        </div>
    </div>
    <div v-if="this.isModalVisible">
        <ModalRegistration isModalVisible = "true"/>
    </div>

    <!-- <Menu class="container"></Menu> -->
</template>

<script>
import HomePage from "./components/Profile.vue";

import CitySelect from "./components/CitySelect.vue";

import Block from "./components/Block.vue";
import axios from "axios";
import router from "./router";
import store from "./store/store";
import mapState from "vuex/dist/vuex.mjs";
import mapActions from "vuex/dist/vuex.mjs";
import ModalRegistration from "./components/Modals/ModalRegistration.vue";
// import {defineAsyncComponent} from "vue";


export default {
    name: "App",
    components: {ModalRegistration, Block, CitySelect},
    data() {
        return ({
            login: '',
            password: '',
            isModalVisible: false,
            isAdmin: false,
            })
    },

    computed:{
        ...mapState['state'],

        state(){
            return this.$store.state.modalRegistration
        },

        isAdmin(){
          return this.$store.state.isAdmin
        }
    },

    watch:{
        state: function () {
            this.isModalVisible = this.$store.state.modalRegistration
        },

        isAdmin: function (){
            this.isAdmin = this.$store.state.isAdmin
        }
    },

    methods: {
        ...mapActions['login', 'showModalRegistration', 'adminEnter'],

        showModal(){
            this.$store.dispatch('showModalRegistration', true)
            this.isModalVisible = this.$store.state.modalRegistration
        },

        loginFunc() {

            let data = {
                login: this.login,
                password: this.password
            }
                axios.post('/login', data).then((response) => {
                    console.log(response.data)
                    if (response.data !== false) {
                        let payload = {
                            idAuthor: response.data.idUser,
                            authorName: response.data.nameUser,
                            login: response.data.login,
                            books: response.data.books,
                        }
                        this.$store.dispatch('login', payload)

                        response.data.roles.forEach((item) => {
                            console.log(item);
                            if (item === 1){
                                this.$store.dispatch('adminEnter', true)
                                this.isAdmin = this.$store.state.isAdmin
                            }
                        })
                        router.push({name: 'Profile'})
                    }
                })
        },

        pushAdmin(){
            router.push({path: '/admin'})
        }

    }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
body {
    margin: 0 auto;
    background-color: #c6dcf2;
    font-family: Montserrat, sans-serif;
}

.container {
    margin: 0 auto;
    width: 1400px;
    /*border: 1px solid red;*/
    padding: 20px 10px;
    /* background-color: rgb(5, 134, 163); */

}

li {
    list-style: none;
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

.header__block {
    width: 180px;
    border: 2px solid white;
    background-color: #3b5e97;
    outline: solid 3px #3b5e97;

}

.header__block-title {
    border-bottom: 2px solid white;
    margin: 1px 1px 10px 1px;
    text-align: center;
    color: white;
    font-size: 12px;
    padding: 5px;
    /* letter-spacing: 1px; */
    font-weight: 600;
    /* font-family: monospace; */
    /*font-family: monospace;*/
}

.header-list {
    margin: 1px;
    text-align: center;
    color: white;
    font-size: 12px;
    padding: 5px 0;
    /*font-family: monospace;*/
    cursor: pointer;
}

.header-list:not(:last-child) {
    border-bottom: 2px solid white;
}

.header__title {
    border: 1px solid #3b5e97;
    background-color: #3b5e97;
    /* text-align: center; */
    text-transform: none;
    align-items: center;
    margin: 0 auto;
}

.header__title h1 {
    /* width: 500px; */
    text-align: center;
    /* font-family: 'Comfortaa', cursive; */
    font-family: 'Montserrat', cursive;

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

.autorisation__form > div {
    display: flex;
    justify-content: space-between;
    width: 250px;
    margin: 10px auto;
    align-items: center;
}


.autorisation__subtitle {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-left: 40px;

}

.autorisation__subtitle button {
    background-color: #3b5e97;
    color: white;
    border: 1px solid;
    padding: 5px 10px;
    border-radius: 2px;
    /* font-family: cursive; */
    /*font-family: cursive;*/
}


.account_group {
    float: right;
    margin: 40px 100px 0 0;
}

.account_group p {
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    line-height: 26px;
    font-weight: 300;
    color: white;
}

.adminBtn{
    height: 45px;
    background-color: #3b5e97;
    border: 2px solid gray;
}

.adminBtn button{
    width: 200px;
    height: 30px;
    background: #ffffff;
    border: none;
    float: right;
    color: #3b5e97;
    margin-right: 3.5rem;
    margin-top: 8px;
}


h1,
h2,
h3,
h4 {
    /* text-transform: uppercase; */
    /* font-family: 'Comfortaa', cursive; */
    font-family: 'Montserrat', cursive;
    font-size: 16px;
    line-height: 26px;
    font-weight: 300;
    color: white;
    margin-bottom: 1em;
    text-align: center;
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

#navbar ul {
    padding: 0 1px;
    list-style: none;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    margin: 10px 0 0 0;
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

#navbar ul li {
    /* border-top: solid 1px #e3e3e3; */
    padding: 3px;
    font-size: 13px;
}

#navbar ul li a {
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    line-height: 26px;
    font-weight: 300;
    color: white;
    text-decoration: none;
}

.blocks{
    position:relative;
    display: flex;
}

.right-blocks{
    position: absolute;
    right: 0;
    top: 0;
    margin: 20px 10px;
}
.right-block, .left-block{

    margin-bottom: 20px;

}

.link-block {
    width: 180px;
    border: 2px solid white;
    background-color: #C6DCF2;
    outline: solid 3px #3b5e97;
    color: #3b5e97;

}
.link-block-title {
    background-color: #3b5e97;
    margin: 1px 1px 1px 1px;
    text-align: center;
    color: white;
    font-size: 14px;
    padding: 2px;
    line-height: 1.5em;
    font-weight: 400;
}
.link-block-title--left{
    text-align: start;
    letter-spacing: -0.2px;
    font-size: 12px;
}
.link-block-title p{
    /* height: 30px; */
    padding: 10px 2px;
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

.link-block-list {
    margin: 1px;
    text-align: start;
    color: #3b5e97;
    font-size: 12px;
    padding: 5px 2px;
    /*font-family: monospace;*/
    cursor: pointer;
}

.link-block-title:not(:last-child) {
    border-bottom: 2px solid white;
}

</style>
