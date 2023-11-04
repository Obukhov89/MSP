<template>
    <button @click="openEdit" class="editBtn">Редактировать</button>
    <div class="container_article">
        {{this.text}}
    </div>
    <div v-if="this.editVisible">
        <CompositionModal  :text = "this.text" :idAuthor = "this.$route.query.authorId" :idText = "this.$route.query.textId"/>
    </div>

<!--    <CompostionModal text = "lthis.text"/>-->
</template>

<script>
import axios from "axios";
import CompositionModal from "../Modals/CompositionModal.vue";
import mapState from "vuex/dist/vuex.mjs";
import mapActions from "vuex/dist/vuex.mjs";

export default {
    name: "Composition",
    components: {CompositionModal},
    props:{
        text: String,
        idAuthor: String,
        idText: String
    },
    data(){
        return({
            authorId: this.$route.query.authorId,
            textId: this.$route.query.textId,
            text: '',
            editVisible: ''
        })
    },

    computed:{
        ...mapState['state'],

        state(){
            return this.$store.state.modalEditComposition
        },
    },

    watch:{
        state: function () {
            this.editVisible = this.$store.state.modalEditComposition
        },
    },

    methods:{
        ...mapActions['showModalEditComposition'],

        showArticle(){
            console.log(this.textId)

            let data = {
                authorId: this.authorId,
                textId: this.textId
            }

            axios.post('/composition', data).then((response) => {
                this.text =response.data;
            })
        },

        openEdit(){
            this.$store.dispatch('showModalEditComposition', true)
            this.editVisible = this.$store.state.modalEditComposition
        }
    },
    beforeMount() {
        this.showArticle()
    }

}
</script>

<style scoped>

.container_article{
    margin-left: 2rem;
    padding: 1rem 0 0 1rem;
    width: 960px;
    height: 1200px;
    background-color: #eeeeee;
    border: 3px solid #3b5e97;
    white-space: pre-line;
}

.editBtn{
    margin-left: 2rem;
    background-color: #3b5e97;
    border: none;

    width: 200px;
    font-size: 16px;
    height: 45px;
    color: white;
}

</style>
