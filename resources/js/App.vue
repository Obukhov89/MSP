<template>
    <div class="container header">
        <div class="header__left">
            <p class="header__left-title">Платон мне друг...</p>
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
                </div>
                <!-- <p class="header__subtitle">конкурсы, публикации, критика, издания, справочники писателей</p> -->
                <h1 class="header__title">При содействии литературного фонда имени Сергея Есенина</h1>

                <form method="post" @submit.prevent="loginFunc" class="autorisation">
                    <h3 class="autorisation__title">Вход для авторов</h3>
                    <div class="autorisation__form">
                        <div>Логин
                            <input type="text" placeholder="" name="login" v-model="login">
                        </div>
                        <div>Пароль
                            <input type="text" placeholder="" name="password" v-model="password">
                        </div>
                    </div>
                    <div class="autorisation__subtitle">
                        <button class="autorisation__btn">Вход</button>
                        <input type="checkbox"> Запомнить меня
                    </div>
                    <p href="">Забыли пароль?</p>
                </form>
            </div>
        </div>
        <div class="header__left">
            <p class="header__left-title">Дежурный писатель</p>
            <img class="rk" src="../../public/img/deg-pisatel.jpg"/>
            <li class="header-list">Мысли, афоризмы и цитаты о писательском труде</li>
            <li class="header-list">Привычки и навыки, помогающие нам в писательском труде</li>
            <li class="header-list">Золотые правила писателей</li>

        </div>
    </div>
    <Menu class="container"></Menu>
    <Block class="container"></Block>


</template>

<script>
import HomePage from "./components/HomePage.vue";
import Menu from "./components/Menu.vue";
import Block from "./components/Block.vue";
import axios from "axios";
import router from "./router";


export default {
    name: "App",
    components: {HomePage, Menu, Block},
    data() {
        return ({
                login: '',
                password: ''
            }
        )
    },
    methods: {

        loginFunc() {

            let data = {
                login: this.login,
                password: this.password
            }

            axios.get('/sanctum/csrf-cookie').then((response) => {
                axios.post('api/login', data).then((response) => {
                    console.log(response.data)
                    if (response.data === true) {
                        router.push({name: 'HomePage'})
                    }
                })
            })
        }
    }

}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body {
    margin: 0 auto;
    background-color: #c6dcf2;
    font-family: 'Montserrat', sans-serif;
}

.container {
    margin: 0 auto;
    width: 1100px;
    /*border: 1px solid red;*/
    padding: 20px 10px;
    /* background-color: rgb(5, 134, 163); */

}

li {
    list-style: none;
}

.logo-container {
    width: 600px;
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

.header__left {
    width: 180px;
    border: 2px solid white;
    background-color: #3b5e97;
}

.header__left-title {
    border: 2px solid white;
    margin: 1px 1px 10px 1px;
    text-align: center;
    color: white;
    font-size: 14px;
    padding: 5px;
    /* letter-spacing: 1px; */
    font-weight: 600;
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
    width: 600px;
    text-transform: none;
    align-items: center;
    margin: 0 auto;
}

.header__title h1 {
    /* width: 500px; */
    text-align: center;
    font-family: 'Montserrat', cursive;

}

.header__group {
    display: flex;
    justify-content: space-between;
    width: 600px;
    text-transform: uppercase;
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
    width: 601px;
    /* height: 80px; */
}

.autorisation {
    border: 2px solid white;
    /* margin-top: auto; */
    width: 300px;
    margin: 10px auto;
    font-size: 12px;
}

.autorisation__title {
    margin: 0;
    background-color: #3b5e97;
}

.autorisation__form > div {
    display: flex;
    justify-content: space-between;
    width: 220px;
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


h1,
h2,
h3,
h4 {
    /* text-transform: uppercase; */
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
}</style>
