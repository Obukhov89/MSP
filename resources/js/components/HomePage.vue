<template>
    <div id="homepage" class="homepage-container">
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
                    <tr v-for="item in nameComposition">
                        <td>{{ item.count }}</td>
                        <td>{{ item.book }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import mapState from "vuex/dist/vuex.mjs";

export default {
    name: "HomePage",

    data(){
        return {
            userName: '',
            countComposition:0,
            nameComposition: []
        }
    },
    computed:{
        ...mapState['state'],
        state() {
            return this.$store.state.authorName
        },
    },
    created() {
        this.userName = this.$store.state.authorName
        // this.countComposition = length.this.$store.state.books
        //
        // this.$store.state.books.forEach((items) => {
        //     this.nameComposition.push(items)
        // })
    },

    methods:{
         addBooks(){
            this.$store.state.books.forEach((item, idx) => {
                this.nameComposition.push({count: idx + 1, book: item})
            })
             console.log(this.nameComposition)
             this.countComposition = this.$store.state.books.length
        }
    },
    beforeMount() {
        this.addBooks()
    }
}
</script>

<style scoped>
#homepage {
    position: absolute;
    left: 273px;
    width: 970px;
    background-color: #C6DCF2;
    margin:0 auto;
}
#homepage h3 {
    text-align: center;
    margin: 0;
    border: 1px solid;
    background-color: #3b5e97;
    font-size: 20px;
    padding: 5px;
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
