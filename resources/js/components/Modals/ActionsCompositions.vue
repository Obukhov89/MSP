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
                        Действия с произведениями:
                        <button type="button" class="btn-close" @click="close" aria-label="Close modal">x</button>
                    </slot>
                </header>
                <div class="divRole">
                    <label class="labelFor" for="author">Редактировать</label>
                    <input type="radio" value= {{true}} id="author" v-model="typeAction">
                    <label class="labelFor" for="reader">Удалить</label>
                    <input type="radio" value= {{false}} id="reader" v-model="typeAction">
                </div>
                <table>
                    <tr class="listComposition" v-for="(items, index) in this.books" key="{{items.textId}}">
                        <td>{{index + 1}}</td>
                        <td>{{items.textTitle}}</td>
                        <td v-if="typeAction"><button class="editBtn">Редактировать</button></td>
                        <td v-else><button class="deleteBtn">Удалить</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </transition>
</template>

<script>

export default {
    name: "ActionsCompositions",
    props: ['books'],

    data(){
      return{
        typeAction: false
      }
    },

    methods:{
        testBook(){
            console.log(this.books);
        }
    },

    beforeMount() {
        this.testBook();
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

.listComposition td{
    text-align: center;
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

.editBtn{
    width: 140px;
    height: 30px;
    background-color: #3b5e97;
    border: none;
    color: #eeeeee;
    border-radius: 3px;
}

.deleteBtn{
    width: 140px;
    height: 30px;
    background-color: #9f4848;
    border: none;
    color: #eeeeee;
    border-radius: 3px;
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
