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
                        Новое произведение
                        <button type="button" class="btn-close" @click="close" aria-label="Close modal">x</button>
                    </slot>
                </header>
                <form enctype="multipart/form-data" class="regForm" method="post" @submit.prevent="onsubmit">
                    <div class="containerInput">
                        <div class="column2">
                            <label class="labelFor">Название произведения:</label>
                            <input class="compositionInput" type="text" v-model="title">
                            <label class="labelFor">Стиль произведения: </label>
                            <select v-model="styleId" class="compositionInput" name="styles" id="style">
                                <option v-for="style in arrStyles" :value="style.idStyle">{{style.styleName}}</option>
                            </select>
                            <label class="labelFor">Произведение(сохранить как:):</label>
                            <div class="divRole">
                                <label class="labelFor" for="author">Файл</label>
                                <input type="radio" v-bind:value="false" id="author" v-model="textArea">
                                <label class="labelFor" for="reader">Исходный текст</label>
                                <input type="radio" v-bind:value="true" id="reader" v-model="textArea">
                            </div>
                            <div class="visibleDiv" v-if="textArea">
                                <textarea class="textareaReg" id="aboutMe" placeholder="Текст произведения" v-model="text"></textarea>
                            </div>
                            <div class="visibleDiv" v-else>
                                <input type="file" name="file" @change="handleFileUpload">
                            </div>
                        </div>
                    </div>
                    <button id="btn" @click="addFile" class="btnRequest">Сохранить</button>
                </form>
            </div>
        </div>
    </transition>
</template>

<script>
import {mapState, mapActions} from "vuex/dist/vuex.mjs";

export default {
    name: "NewCompositionModal",

    data(){
        return{
            file: null,
            title: '',
            idAuthor: '',
            textArea: false,
            arrStyles: [],
            text: '',
            styleId: 0,
            oldId: 0
        }
    },

    computed:{
        ...mapState('auth', ['store']),

        storeId(){
            return this.$store.state.auth.idAuthor
        }
    },

    created() {
        if (this.$store.state.auth.oldId.length !== 0){
            this.oldId = this.$store.state.auth.oldId.length
        }
            this.idAuthor =  this.$store.state.auth.idAuthor;
    },

    methods:{

        ...mapActions('displayingElements', ['hideAdd']),

        getStyles(){
            axios.get('/getAllStyles').then((response) => {
                response.data.forEach((item) => {
                    this.arrStyles.push({idStyle : item.id, styleName: item.name})
                })
            })
        },

        handleFileUpload(e){
            this.file = e.target.files[0];
        },

        addFile(){
            let formData = new FormData();
            if (this.textArea){

                formData.append('text', this.text)
                formData.append('idAuthor',  this.oldId)
                formData.append('title', this.title)
                formData.append('style', this.styleId)
                axios.post('/addNewComposition', formData).then((response) => {
                    console.log(response.data)
                })

            }
            else {
                console.log(this.$store.state.auth.idAuthor)
                formData.append('file', this.file);
                formData.append('idAuthor',  this.oldId)
                formData.append('title', this.title)

                console.log(formData.has('file'))
                axios.post('/addNewComposition', formData).then((response) => {



                    this.arrStyles = response.data
                    console.log(this.arrStyles)
                })
            }

        },

        close(){
            this.$store.dispatch('displayingElements/hideAdd', false)
        }
    },
    beforeMount() {
        this.getStyles();
    }
}
</script>

<style scoped>

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

.divRole{
    display: flex;
}

.compositionInput{
    width: 350px;
    padding-left: 5px;
    height: 35px;
    border: 1px solid #707e9b;
}

.modal {
    margin-top: 50px;
    width: 500px;
    height: 630px;
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
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

.visibleDiv{
    width: 350px;
}

.containerInput{
    margin: 0 auto;
    height: 500px;
    display: flex;
    justify-content: space-around;
}


.labelFor{
    margin: 1rem;
    color: #3b5e97;
}

.column2{
    /*padding-left: 1rem;*/
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
}


.btn-close {
    border: none;
    font-size: 20px;
    /*padding: 20px;*/
    cursor: pointer;
    font-weight: bold;
    color: #eeeeee;
    background: transparent;
}

.textareaReg{
    /*margin-left: 1rem;*/
    margin: 0 auto;
    width: inherit;
    border: 1px solid #707e9b;
    border-radius: 5px;
    padding-left: 10px;
}

.btnRequest{
    float: right;
    margin-right: 2.5rem;
    background-color: #3b5e97;
    border: none;
    border-radius: 5px;
    width: 200px;
    font-size: 16px;
    height: 45px;
    color: white;
}

</style>
