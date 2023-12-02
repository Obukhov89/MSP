<template>
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
    <div v-if="modalRegistration">
        <ModalRegistration/>
    </div>
</template>

<script>
import  {mapActions, mapState, mapGetters} from "vuex/dist/vuex.mjs";
import axios from "axios";
import router from "../router";
import ModalRegistration from "./Modals/ModalRegistration.vue";

export default {
    name: "LoginForm",
    components: {ModalRegistration},
    data(){
        return{
            login: '',
            password: '',
        }
    },

    computed:{
        ...mapState('auth', ['state'], 'displayingElements', ['state']),

        ...mapGetters('displayingElements', ['modalRegistration']),

        isAdmin(){
            return this.$store.state.auth.isAdmin
        },

        visibleNews(){
            return this.$store.state.displayingElements.blockNews
        },

        modalRegistration(){
            return this.$store.getters['displayingElements/modalRegistration']
        }

    },

    watch:{
        state: function () {
            this.isModalVisible = this.$store.state.modalRegistration
        },

        isAdmin: function (){
            this.isAdmin = this.$store.state.auth.isAdmin
        },


        visibleNews: function (){
            this.newsVisible = this.$store.state.displayingElements.blockNews
        },

    },

    methods:{
        ...mapActions('auth', ['login', 'adminEnter'], 'composition', ['counterBooks'], 'contest', ['addAllContests'],
            'displayingElements', ['modalRegistration']),

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
                        oldId: response.data.oldId
                    };

                    let payloadBook = {
                        countBooks: payload.books.length,
                        book: payload.books
                    }

                    this.$store.dispatch('auth/login', payload)
                    this.$store.dispatch('composition/allBooks', payloadBook)

                    response.data.roles.forEach((item) => {
                        console.log(item);
                        if (item === 1){
                            this.$store.dispatch('auth/adminEnter', true)
                            this.isAdmin = this.$store.state.auth.isAdmin
                        }
                    })
                    router.push({name: 'Profile'})
                }
            })
        },

        showModal(){
            console.log('ok');
            this.$store.dispatch('displayingElements/modalRegistration', true)
        },


        pushAdmin(){
            this.$store.dispatch('hideNews')
            router.push({path: '/admin'})
        },
    }
}
</script>

<style scoped>

</style>
