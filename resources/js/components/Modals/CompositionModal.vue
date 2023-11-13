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
                        Редактирование произведения
                        <button type="button" class="btn-close" @click="close" aria-label="Close modal">x</button>
                    </slot>
                </header>
                <form class="regForm" @submit.prevent="onsubmit">
                    <div class="containerInput">
                        <div class="column2">
                            <label class="labelFor" for="aboutMe">Произведение:</label>
                            <textarea class="textareaEdit" id="aboutMe" v-model="text">{{text}}</textarea>
                        </div>
                    </div>
                    <button id="btn" @click="editComposition" class="btnRequest">Редактировать</button>
                </form>
            </div>
        </div>
    </transition>
</template>

<script>
import axios from "axios";
import  {mapActions, mapState} from "vuex/dist/vuex.mjs";

export default {
    name: "CompositionModal",
    props: ['text', 'idAuthor', 'idText'],

    ...mapState('displayingElements', ['state']),

    methods:{
        ...mapActions['closeModalEditComposition'],
        editComposition(){
            let data = {
              idAuthor: this.idAuthor,
              idText: this.idText,
              text: this.text
            };
            axios.post('/compositionEdit', data).then((response) => {
                if (response.data !== false){
                    alert('Сохранение выполнено успешно')
                    this.$store.dispatch('displayingElements/closeModalEditComposition', false)
                }
            })
        },

        close(){
            this.$store.dispatch('displayingElements/closeModalEditComposition', false)
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

.modal {
    margin-top: 50px;
    width: 1000px;
    height: 600px;
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


.containerInput{
    margin: 0 auto;
    display: flex;
    justify-content: space-around;
}


.labelFor{
    margin: 1rem;
    color: #3b5e97;
}

.textareaEdit{
    width: 900px;
    height: 100%;
    border: 1px solid #707e9b;
    border-radius: 5px;
    padding-left: 10px;
}


.column2{
    /*padding-left: 1rem;*/
    height: 400px;
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
}

.modal-body {
    position: relative;
    padding: 20px 10px;
}

.btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #eeeeee;
    background: transparent;
}

.btnRequest{
    float: right;
    margin-right: 2.5rem;
    margin-top: 1rem;
    background-color: #3b5e97;
    border: none;
    border-radius: 5px;
    width: 200px;
    font-size: 16px;
    height: 45px;
    color: white;
}

</style>
