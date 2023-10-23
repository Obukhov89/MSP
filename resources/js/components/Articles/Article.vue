<template>
    <h1>Произведение здесь</h1>
</template>

<script>
import axios from "axios";

export default {
    name: "Article",

    data(){
        return({
            authorId: this.$route.query.authorId,
            textId: this.$route.query.textId,
        })
    },

    methods:{
        showArticle(){
            console.log(this.textId)

            axios.get('/article').then((response) => {
                console.log(response.data);
            })
        }
    },
    beforeMount() {
        this.showArticle()
    }

}
</script>

<style scoped>

</style>
