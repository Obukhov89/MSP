<template>
    <div id="homepage" class="homepage-container">
        <p class="managementHeader">Управление профилем</p>
        <div class="managementDiv">
            <button class="manageBtn">Редактировать профиль</button>
            <button @click="visibleAddComposition" class="manageBtn">Добавить произведение</button>
            <button class="manageBtn">Мой лицевой счет</button>
        </div>
        <div class="homepage__user">
            <h3>{{ userName }}</h3>
            <ul>
                <li>Количество произведений: {{ countComposition }}</li>
                <li>Получено рецензий: </li>
                <li>Написано рецензий: </li>
                <hr>
                <li>Мои произведения читали: </li>
            </ul>
        </div>
        <div class="homepage__composition">
            <h3>Мои произведения</h3>
            <div class="composition-table">
                <div class="composition-table-title">
                    <div class="composition-number">№</div>
                    <div class="composition-name">Название произведения</div>
                    <div class="composition-genre">Жанр</div>
                </div>
                <table class="tableComposition">
                    <tr v-for="item in nameComposition " :key="item">
                        <td>{{ item.count }}</td>
                        <td><router-link :to="{name: 'composition', query:{authorId: this.oldId, textId: item.book.textId}}">
                            {{ item.book.textTitle }}
                        </router-link>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div v-if="this.addComposition">
        <NewCompositionModal></NewCompositionModal>
    </div>
</template>

<script>
import  {mapState, mapActions} from "vuex/dist/vuex.mjs";
import displayningElements from "../store/modules/displayningElements/displayingElements";
import NewCompositionModal from "./Modals/NewCompositionModal.vue";

export default {
    name: "HomePage",
    components: {NewCompositionModal},
    data(){
        return {
            authorId: '',
            userName: '',
            countComposition:0,
            nameComposition: [],
            addComposition: false
        }
    },
    computed:{
        ...mapState('auth',['state'], 'displayingElements', ['state']),
        state() {
            return this.$store.state.auth.authorName
        },

        books(){
          return this.$store.state.auth.books
        },
        //
        authorId(){
          return  this.$store.state.auth.idAuthor
        },

        oldId(){
            return  this.$store.state.auth.oldId
        },

        //
        visibleNews(){
            console.log(this.$store.state.displayingElements.blockNews)
            return this.$store.state.displayingElements.blockNews
        },

        visibleComposition(){
            console.log(this.$store.state.displayingElements.addModalComposition)
            return this.$store.state.displayingElements.addModalComposition
        }
    },
    created() {
        this.userName = this.$store.state.auth.authorName
        this.authorId = this.$store.state.auth.idAuthor
        this.addComposition = this.$store.state.displayingElements.addModalComposition
        this.oldId = this.$store.state.auth.oldId

    },

    watch:{
        visibleComposition: function (){
            this.addComposition = this.$store.state.displayingElements.addModalComposition
        }
    },

    methods:{
        ...mapActions('displayningElements',['hideNews', 'visibleAdd']),
         addBooks(){
             this.$store.state.auth.books.forEach((item, idx) => {
                 console.log()
                 this.nameComposition.push({count: idx + 1, book: item})
             })
             this.countComposition = this.$store.state.auth.books.length
        },

        visibleAddComposition(){
            let payload = true

            console.log(payload)
            this.$store.dispatch('displayingElements/visibleAdd', true)
        }
    },
    beforeMount() {
        this.addBooks();
        let payload = false;
        this.$store.dispatch('displayingElements/hideNews', payload)
    }
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

.managementHeader{
    text-align: center;
}

.managementDiv{
    display: flex;
    align-items: center;
    justify-content: flex-end;
    height: 55px;
}

.managementDiv button:not(:first-child){
    margin-left: 1rem;
}

.manageBtn{
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

.homepage-container{
    width: 1000px;
}
.composition-table-title{
    display: flex;
    justify-content: space-between;
    padding:10px;
    background-color: #C6DCF2;
}

.tableComposition{
    width: 100%;
}

.tableComposition tr{
    border: 1px solid gray;
}

.tableComposition td{
    padding-left: 1rem;
    border-bottom: 1px solid gray;
}

</style>
