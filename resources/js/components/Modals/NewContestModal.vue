<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modalContest"
                 role="dialog"
                 aria-labelledby="modalTitle"
                 aria-describedby="modalDescription">
                <header
                    class="modal-header"
                    id="modalTitle">
                    <slot name="header">
                        Новый конкурс:
                        <label class="labelForHead" for="author">Существующий (проводился ранее)</label>
                        <input type="radio" value="exist" id="author" @click="changeItem('exist')"
                               v-model="typeContest">

                        <label class="labelForHead" for="reader">Новый (проводится впервые)</label>
                        <input type="radio" value="new" id="reader" @click="changeItem('new')" v-model="typeContest">

                        <button type="button" class="btn-close" @click="closeContest" aria-label="Close modal">x
                        </button>
                    </slot>
                </header>
                <form class="regForm" @submit.prevent="onsubmit">
                    <div class="containerInput">
                        <component :is="changeInputs(this.typeContest)"></component>
                    </div>
                    <button id="btn" @click="createContest" class="btnRequest">Опубликовать</button>
                </form>
            </div>
        </div>
    </transition>
</template>

<script>
import {mapState, mapActions} from "vuex/dist/vuex.mjs";
import axios from "axios";
import ExConInpts from "../asyncComponents/ExConInpts.vue";
import NewConInpts from "../asyncComponents/NewConInpts.vue";
import {defineAsyncComponent} from "vue";

export default {
    name: "NewContestModal",
    components: {NewConInpts, ExConInpts},
    data() {
        return {
            typeContest: 'exist'
        }
    },

    computed: {
        ...mapState('contest', ['state']),

        getIdContest: function () {
            return this.$store.state.contest.contestId;
        },

        getNameContest: function () {
            return this.$store.state.contest.nameContest
        },

        getDateStart: function () {
            return this.$store.state.contest.dateStart
        },

        getDateEnd: function () {
            return this.$store.state.contest.dateEnd
        },

        getStyleId: function () {
            return this.$store.state.contest.styleId
        },

        getPriceContest: function () {
            return this.$store.state.contest.priceContest
        }
    },

    methods: {
        ...mapActions('displayingElements', ['modalContest'], 'contest', ['changeItem']),

        closeContest() {
            this.$store.dispatch('displayingElements/modalContest', false)
        },


        changeInputs(item) {
            let nameComponent = ''

            switch (item) {
                case 'exist':
                    nameComponent = 'ExConInpts'
                    break;
                case 'new':
                    nameComponent = 'NewConInpts'
                    break;
            }

            return defineAsyncComponent(() => import(`../asyncComponents/${nameComponent}.vue`))
        },

        changeItem(item) {
            this.$store.dispatch('contest/changeItem', item)
        },

        createContest() {
            let data = new FormData()

            data.set('idProject', this.getIdContest);
            data.set('date_start', this.getDateStart);
            data.set('date_end', this.getDateEnd);
            data.set('form_id', this.getStyleId);
            data.set('price_contest', this.getPriceContest);
            data.set('nameContest', this.getNameContest)

            axios.post('/setNewContest', data).then((response) => {
                console.log(response.data)
                this.closeContest();
            })

        }
    },
}
</script>

<style>
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

.modalContest {
    margin-top: 10px;
    width: 900px;
    height: 600px;
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
}

.modal-header,
.modal-footer {
    padding: 15px;
    display: flex;
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


.containerInput {
    margin: 0 auto;
    display: flex;
    justify-content: space-around;
}


.labelForHead {
    margin: 1rem;
    color: #ffffff;
}


.column {
    height: 550px;
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
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

.btnRequest {
    float: right;
    margin-right: 2rem;
    background-color: #3b5e97;
    border: none;
    border-radius: 5px;
    width: 200px;
    font-size: 16px;
    height: 45px;
    color: white;
}

</style>
