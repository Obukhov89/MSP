<template :key="this.counterBooks">
    <div id="homepage" class="homepage-container">
        <p class="managementHeader">Управление профилем</p>
        <div class="managementDiv">
            <button class="manageBtn">Редактировать профиль</button>
            <button @click="goContests" class="manageBtn">Участвовать в конкурсах</button>
            <button @click="visibleAddComposition" class="manageBtn">Добавить произведение</button>
            <button class="manageBtn">Мой лицевой счет</button>
        </div>
        <div class="homepage__user">
            <h3>{{ userName }}</h3>
            <ul>
                <li>Количество произведений: {{ books.length }}</li>
                <li>Получено рецензий:</li>
                <li>Написано рецензий:</li>
                <hr>
                <li>Мои произведения читали:</li>
            </ul>
        </div>
        <div class="homepage__composition">
            <h3>Мои произведения</h3>
            <div class="composition-table">
                <table class="tableComposition">
                    <thead>
                    <tr>
                        <td class="composition-number">№</td>
                        <td class="composition-name">Название произведения</td>
                        <td class="composition-genre">Жанр</td>
                        <td colspan="2" class="composition-genre">Действия с произведениями</td>
                    </tr>
                    </thead>
                    <tr v-for="(item, index) in books " :key="index">
                        <td>{{ index + 1 }}</td>
                        <td>
                            <router-link
                                :to="{name: 'composition', query:{authorId: this.authorId, textId: item.textId}}">
                                {{ item.textTitle }}
                            </router-link>
                        </td>
                        <td></td>
                        <td>
                            <button @click="openEdit(item.textId)" class="editBtn">Редактировать</button>
                        </td>
                        <td>
                            <button @click="dellComposition(item.textId)" class="deleteBtn">Удалить</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div v-if="this.addComposition">
        <NewCompositionModal></NewCompositionModal>
    </div>
    <div v-if="this.editVisible">
        <CompositionModal :text="this.text" :idAuthor="this.authorId" :idText="this.idText"></CompositionModal>
    </div>
</template>

<script>
import {mapState, mapActions} from "vuex/dist/vuex.mjs";
import NewCompositionModal from "./Modals/NewCompositionModal.vue";
import ActionsCompositions from "./Modals/ActionsCompositions.vue";
import CompositionModal from "./Modals/CompositionModal.vue";
import axios from "axios";
import router from "../router";


export default {
    name: "HomePage",
    components: {CompositionModal, ActionsCompositions, NewCompositionModal},
    data() {
        return {
            authorId: '',
            userName: '',
            countComposition: 0,
            nameComposition: [],
            addComposition: false,
            componentKey: 0,
            editVisible: '',
            text: '',
            idText: ''
        }
    },
    computed: {
        ...mapState('auth', ['state'], 'displayingElements', ['state'], 'composition', ['counterBooks', 'books']),
        state() {
            return this.$store.state.auth.authorName
        },

        books() {
            return this.$store.state.composition.books
        },

        counterBooks() {
            return this.$store.state.composition.countBooks
        },

        authorId() {
            return this.$store.state.auth.idAuthor
        },

        visibleNews() {
            console.log(this.$store.state.displayingElements.blockNews)
            return this.$store.state.displayingElements.blockNews
        },

        visibleComposition() {
            console.log(this.$store.state.displayingElements.addModalComposition)
            return this.$store.state.displayingElements.addModalComposition
        },

        visibleEdit() {
            return this.$store.state.displayingElements.modalEditComposition
        }

    },
    created() {
        this.userName = this.$store.state.auth.authorName
        this.authorId = this.$store.state.auth.idAuthor
        this.addComposition = this.$store.state.displayingElements.addModalComposition,
            this.componentKey = this.$store.state.composition.countBooks;
    },

    watch: {
        visibleComposition: function () {
            this.addComposition = this.$store.state.displayingElements.addModalComposition
        },

        visibleEdit: function () {
            this.editVisible = this.$store.state.displayingElements.modalEditComposition
        }
    },

    methods: {
        ...mapActions('displayningElements', ['hideNews', 'visibleAdd', 'visibleEdit'], 'composition', ['delComposition']),
        addBooks() {
            this.$store.state.composition.books.forEach((item, idx) => {
                this.nameComposition.push({count: idx + 1, book: item})
            })
            this.countComposition = this.$store.state.auth.books.length
        },

        visibleAddComposition() {
            let payload = true

            console.log(payload)
            this.$store.dispatch('displayingElements/visibleAdd', true)
        },

        openEdit(textId) {
            let data = {
                authorId: this.authorId,
                textId: textId
            }

            this.idText = textId

            axios.post('/composition', data).then((response) => {
                this.text = JSON.parse(response.data);
            })

            this.$store.dispatch('displayingElements/visibleEdit', true)
        },

        dellComposition(index) {
            let data = {
                textId: index,
                authorId: this.authorId
            };

            axios.post('/deleteComposition', data).then((response) =>{
                console.log(response.data)
            })

            this.$store.dispatch('composition/delComposition', index)

            console.log(index)
        },

        goContests(){
            router.push({name: 'Contests'})
        }
    },
    beforeMount() {
        this.addBooks();
        let payload = false;
        this.$store.dispatch('displayingElements/hideNews', payload)
    },
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

#homepage {
    margin-left: 2rem;
    width: 970px;
    background-color: #C6DCF2;
    /*margin:0 auto;*/
}

#homepage h3 {
    text-align: center;
    margin: 0;
    border: 1px solid;
    background-color: #3b5e97;
    font-size: 20px;
    padding: 5px;
}

.managementHeader {
    text-align: center;
}

.managementDiv {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    height: 55px;
}

.managementDiv button:not(:first-child) {
    margin-left: 1rem;
}

.manageBtn {
    width: 190px;
    height: 45px;
    background-color: #3b5e97;
    border: none;
    color: #eeeeee;
    font-size: 16px;
    font-family: 'Montserrat', sans-serif;
}

#homepage ul {
    padding: 20px;
    list-style: none;
    margin: 0;
    background-color: #eaf2fa;
}

.homepage-container {
    width: 1000px;
}


.tableComposition {
    margin-top: 2rem;
    width: 100%;
    border-collapse: collapse;
}

.tableComposition tr {
    border-bottom: 1px solid gray;
}

.tableComposition td {

    border-bottom: 1px solid gray;
    text-align: center;
}

.editBtn {
    width: 140px;
    height: 30px;
    background-color: #3b5e97;
    border: none;
    color: #eeeeee;
    border-radius: 3px;
    float: right;
}

.deleteBtn {
    width: 140px;
    height: 30px;
    background-color: #9f4848;
    border: none;
    color: #eeeeee;
    border-radius: 3px;
}

</style>
