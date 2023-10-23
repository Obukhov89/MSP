<template>
    <div class="container_article">
        {{this.text}}
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Article",

    data(){
        return({
            authorId: this.$route.query.authorId,
            textId: this.$route.query.textId,
            text: '',
        })
    },

    methods:{
        showArticle(){
            console.log(this.textId)

            let data = {
                authorId: this.authorId,
                textId: this.textId
            }

            axios.post('/article', data).then((response) => {
                console.log(response.data);
                let preText = JSON.stringify(response.data)
                this.text =JSON.parse(preText);
            })
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
    border-radius: 5px;
    white-space: pre-line;
}

</style>
