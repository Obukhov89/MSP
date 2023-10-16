<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modal"
                 role="dialog"
                 aria-labelledby="modalTitle"
                 aria-describedby="modalDescription">
                <header
                    class="modal-header"
                    id="modalTitle">
                    <slot name="header">
                        Форма регистрации
                        <button type="button" class="btn-close" @click="close" aria-label="Close modal">x</button>
                    </slot>
                </header>
                <form class="regForm" @submit.prevent="onsubmit">
                    <div class="divRole"><p class="headerRole">Зарегестрироваться как:</p>
                    <label class="labelFor" for="author">Автор</label>
                    <input type="radio" value="2" id="author" v-model="role">
                        <label class="labelFor" for="reader">Читатель</label>
                        <input type="radio" value="3" id="reader" v-model="role">
                    </div>
                    <div class="containerInput">
                        <div class="column1">
                            <label class="labelFor" for="name">Укажите вашу фамилию имя и отчество</label>
                            <input class="inputReg" id="name" type="text" placeholder="Фамилия Имя Отчество" v-model="name">
                            <label class="labelFor" for="login">Укажите логин для входа</label>
                            <input class="inputReg" id="login" type="text" placeholder="Логин" v-model="login">
                            <label class="labelFor" for="nick">Укажите желаемый ник</label>
                            <input class="inputReg" id="nick" type="text" placeholder="Ник в системе" v-model="nickName">
                            <label class="labelFor" for="pass">Укажите пароль</label>
                            <input class="inputReg" id="pass" type="password" placeholder="пароль" v-model="password">
                        </div>
                        <div class="column2">
                            <label class="labelFor" for="email">Укажите ваш email</label>
                            <input class="inputReg" id="email" type="text" placeholder="email" v-model="email">
                            <label class="labelFor" for="link">Ссылка на ваш ресурс</label>
                            <input class="inputReg" id="link" type="text" placeholder="Ссылка на собственный сайт (если есть)" v-model="link">
                            <label class="labelFor" for="aboutMe">Несколько слов о себе</label>
                            <textarea class="textareaReg" id="aboutMe" placeholder="О себе" v-model="aboutMe"></textarea>
                            <label class="labelFor" for="address">Расскажите откуда вы? (Страна,
                                почтовый адрес)</label>
                            <input class="inputReg" id="address" type="text" placeholder="Адрес проживания" v-model="address">
                        </div>
                    </div>
                    <button id="btn" @click="responseRegistration" class="btnRequest">Подать заявку на регистрацию</button>
                </form>
            </div>
        </div>
    </transition>
</template>

<script>
// import mapState from "vuex/dist/vuex.mjs";
import mapActions from "vuex/dist/vuex.mjs";
import axios from "axios";

export default {
    name: "ModalRegistration",

    data(){
      return{
          name: '',
          login: '',
          nickName: '',
          password: '',
          email: '',
          aboutMe: '',
          address: '',
          link:'',
          role: 0
      }
    },

    methods:{
        ...mapActions['closeModalRegistration'],
        close() {
            this.$store.dispatch('closeModalRegistration', false)
        },

        responseRegistration(){
            let dataResponse = {
                name: this.name,
                login: this.login,
                nick: this.nickName,
                password: this.password,
                email: this.email,
                aboutMe: this.aboutMe,
                address: this.address,
                link: this.link,
                role: this.role
            }

            axios.post('/requestRegistration', dataResponse).then((response) => {
                console.log(response.data)
                this.close();
            })

        }
    }
}
</script>

<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;

}

.modal {
    margin-top: 50px;
    width: 1000px;
    height: 600px;
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
}

.modal-header,
.modal-footer {
    padding: 15px;
    display: flex;
}

.divRole{

    display: flex;
}

.modal-header {
    background: #3b5e97;
    height: 25px;
    border-bottom: 1px solid #eeeeee;
    color: #eeeeee;
    display: flex;
    align-items: center;
    justify-content: space-between;
}


.containerInput{
    margin: 0 auto;
    display: flex;
    justify-content: space-around;
}

.headerRole{
    margin: 1rem;
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

.textareaReg{
    margin-left: 1rem;
    width: 350px;
    border: 1px solid #707e9b;
    border-radius: 5px;
    padding-left: 10px;
}

.column1{
    height: 400px;
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
}

.column2{
    /*padding-left: 1rem;*/
    height: 400px;
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
}

.modal-body {
    position: relative;
    padding: 20px 10px;
}

.btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #eeeeee;
    background: transparent;
}

.btnRequest{
    float: right;
    margin-right: 2rem;
    background-color: #3b5e97;
    border: none;
    border-radius: 5px;
    width: 200px;
    font-size: 16px;
    height: 45px;
    color: white;
}

</style>
