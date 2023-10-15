import axios from "axios";
import router from "./router";
import mapState from "vuex/dist/vuex.mjs";
import mapActions from "vuex/dist/vuex.mjs";

export default (await
    import ('vue')).defineComponent({
    name: "App",
    components: { Block, CitySelect },
    data() {
        return ({
            login: '',
            password: '',
            options: [
                { name: 'Центральный ФО' },

                cities, [
                    { name: 'Москва и область', value: 1 },
                    { name: 'Рязанская область', value: 2 },
                    { name: 'Липецкая область', value: 3 },
                    { name: 'Тамбовская область', value: 4 },
                    { name: 'Белгородская область', value: 5 },
                    { name: 'Курская область', value: 6 },
                    { name: 'Ивановская область', value: 7 },
                    { name: 'Ярославская область', value: 8 },
                    { name: 'Калужская область', value: 9 },
                    { name: 'Воронежская область', value: 10 },
                    { name: 'Костромская область', value: 11 },
                    { name: 'Тверская область', value: 12 },
                    { name: 'Оровская область', value: 13 },
                    { name: 'Смоленская область', value: 14 },
                    { name: 'Тульская область', value: 15 },
                ]
            ],

            options: [
                { name: 'Северо-Западный ФО', value: 2 }
            ],
        });
    },

    computed: {
        ...mapState['state']
    },

    methods: {
        ...mapActions['login'],

        loginFunc() {

            let data = {
                login: this.login,
                password: this.password
            };
            axios.post('/login', data).then((response) => {
                console.log(response.data);
                if (response.data !== '') {
                    let payload = {
                        idAuthor: response.data.idUser,
                        authorName: response.data.nameUser,
                        login: response.data.login,
                        books: response.data.books,
                    };
                    this.$store.dispatch('login', payload);
                    router.push({ name: 'HomePage' });
                }
            });
        }
    }
});