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
                        Форма заявки на конкурс
                        <button type="button" class="btn-close" @click="close" aria-label="Close modal">x</button>
                    </slot>
                </header>
                <form class="regForm" @submit.prevent="onsubmit">
                    <div class="divRole"><p class="headerRole">Выбрать произведение:</p>
                        <label class="labelFor" for="author">Существующее</label>
                        <input type="radio" value="exist" id="author" v-model="composition">
                        <label class="labelFor" for="reader">Новое</label>
                        <input type="radio" value="new" id="reader" v-model="composition">
                    </div>
                    <div class="containerInput">
                        <div class="column1">
                            <component :is="addInputs(this.composition)"></component>
                        </div>
                    </div>
                    <button id="btn" @click="addCompositionContest" class="btnRequest">Подать заявку</button>
                </form>
            </div>
        </div>
    </transition>
</template>

<script>
import  {mapState, mapActions} from "vuex/dist/vuex.mjs";
import ExistInputGroup from "../asyncComponents/ExistInputGroup.vue";
import NewInputGroup from "../asyncComponents/NewInputGroup.vue";
import {defineAsyncComponent} from "vue";
import axios from "axios";

export default {
    name: "ApplicationContest",
    components: {NewInputGroup, ExistInputGroup},
    data() {
        return {
            composition: 'exist'
        }
    },

    computed:{
      ...mapState('forContest', ['state'], 'auth', ['state']),

        getId: function (){
          return this.$store.state.forContest.idComposition
        },

        getContestId: function (){
          return this.$store.state.forContest.idContest
        },

        getIdAuthor: function (){
            return  this.$store.state.auth.idAuthor
        },

        getFile: function (){
          return this.$store.state.forContest.file
        },

        getTitle: function (){
          return this.$store.state.forContest.title
        },

        getStyleId: function (){
          return this.$store.state.forContest.idStyle
        },

        getText: function (){
          return this.$store.state.forContest.textComposition
        }

    },

    methods: {
        ...mapActions('displayingElements', ['applicationContest']),

        close() {
            this.$store.dispatch('displayingElements/applicationContest', false)
        },

        addInputs(type) {
            let nameInputGroup = '';

            switch (type) {
                case 'exist':
                    nameInputGroup = 'ExistInputGroup.vue'
                    break;
                case 'new':
                    nameInputGroup = 'NewInputGroup.vue'
                    break;
            }

            return defineAsyncComponent(() => import(`../asyncComponents/${nameInputGroup}`))
        },

        addCompositionContest(){
            let formData = new FormData();
            let addData = {};

            console.log(this.getContestId)

            if (this.composition === 'exist'){
                formData.set('idComposition', this.getId)
                formData.set('idContest', this.getContestId)
                formData.set('idAuthor', this.getIdAuthor)

                axios.post('/reqReadyCompCont', formData).then((response) => {
                    console.log(response.data)
                    this.close()
                })
            }else {
                if (this.getFile !== null){
                    formData.set('file', this.getFile);
                    formData.set('idAuthor', this.getIdAuthor);
                    formData.set('title', this.getTitle);
                    formData.set('style', this.getStyleId);

                    axios.post('/addNewComposition', formData).then((response) => {
                        addData = {
                            idComposition: response.data.id,
                            idContest: this.getContestId,
                            idAuthor: this.getIdAuthor
                        };

                        axios.post('/reqReadyCompCont', addData).then((response) => {
                            console.log(response.data)
                            this.close()
                        })
                    })
                }else {
                    formData.set('text', this.getText)
                    formData.set('idAuthor', this.getIdAuthor);
                    formData.set('title', this.getTitle);
                    formData.set('style', this.getStyleId);
                    axios.post('/addNewComposition', formData).then((response) => {
                        addData = {
                            idComposition: response.data.id,
                            idContest: this.getContestId,
                            idAuthor: this.getIdAuthor
                        };

                        axios.post('/reqReadyCompCont', addData).then((response) => {
                            console.log(response.data)
                            this.close()
                        })
                    })
                }
            }
        }
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

.divRole {
    display: flex;
}

.compositionInput {
    width: 350px;
    padding-left: 5px;
    height: 35px;
    border: 1px solid #707e9b;
}

.modal {
    margin-top: 50px;
    width: 600px;
    height: 700px;
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

.visibleDiv {
    width: 350px;
}

.containerInput {
    margin: 0 auto;
    height: 500px;
    display: flex;
    justify-content: space-around;
}


.labelFor {
    margin: 1rem;
    color: #3b5e97;
}

.column2 {
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

.textareaReg {
    /*margin-left: 1rem;*/
    margin: 0 auto;
    width: inherit;
    border: 1px solid #707e9b;
    border-radius: 5px;
    padding-left: 10px;
}

.btnRequest {
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
