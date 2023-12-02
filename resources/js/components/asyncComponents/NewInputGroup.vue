<template>
    <div class="containerInput">
        <div class="column2">
            <label class="labelFor">Название произведения:</label>
            <input class="compositionInput" type="text" v-model="title" @change="setInput({'key': 'title', 'payload': this.title})">
            <label class="labelFor">Стиль произведения: </label>
            <select v-model="styleId" class="compositionInput" name="styles" id="style"
                    @change="setInput({'key': 'idStyle', 'payload': this.styleId})">
                <option v-for="style in arrStyles" :value="style.idStyle">{{style.styleName}}</option>
            </select>
            <label class="labelFor">Произведение(сохранить как:):</label>
            <div class="divRole">
                <label class="labelFor" for="author">Файл</label>
                <input type="radio" v-bind:value="false" @click="changeData('file')" id="author" v-model="textArea">
                <label class="labelFor" for="reader">Исходный текст</label>
                <input type="radio" v-bind:value="true" id="reader" @click="changeData('text')" v-model="textArea">
            </div>
            <div class="visibleDiv" v-if="textArea">
                <textarea class="textareaReg" id="aboutMe" placeholder="Текст произведения" v-model="text"
                          @change="setInput({'key': 'textComposition', 'payload': this.text})"></textarea>
            </div>
            <div class="visibleDiv" v-else>
                <input type="file" name="file" @change="handleFileUpload">
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex/dist/vuex.mjs";

export default {
    name: "NewInputGroup",

    data(){
        return{
            textArea: false,
            text:'',
            styleId: 0,
            arrStyles: [],
            file: null,
            title: '',
        }
    },

    methods: {
        ...mapActions('forContest', ['addNewCompos', 'delItem']),

        getStyles(){
            axios.get('/getAllStyles').then((response) => {
                response.data.forEach((item) => {
                    this.arrStyles.push({idStyle : item.id, styleName: item.name})
                })
            })
        },

        handleFileUpload(e){
            this.file = e.target.files[0];
            this.setInput({'key': 'file', 'payload': this.file})
        },

        setInput(item){
            this.$store.dispatch('forContest/addNewCompos', item)
        },

        changeData(key){
            this.$store.dispatch('forContest/delItem', key)
        }
    },

    beforeMount() {
        this.getStyles()
    }
}
</script>

<style scoped>
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

.textareaReg{
    /*margin-left: 1rem;*/
    margin: 0 auto;
    width: inherit;
    border: 1px solid #707e9b;
    border-radius: 5px;
    padding-left: 10px;
}
</style>
