<template>
    <div class="citySelect">
        <p
        @click="federalOkrugVisible = !federalOkrugVisible" class="link-block-title link-block-title--left">&#9658; Писатели России</p>


        <div v-for="folder in folders" :key="folder">
            <div class="link-block-list" v-if="federalOkrugVisible" @click="toggle(folder.name)" style="background-color:#C6DCF2">&#9658; {{ folder.name }}</div>

            <div v-show="false" :id="folder.name">
                <div v-for="page in folder.pages" :key="page">
                    <div class="link-block-list" style="background-color:#C6DCF2"> {{ page.name }}</div>
                </div>
            </div>
        </div>

        <p class="link-block-title link-block-title--left">&#9658; Писатели Зарубежья</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Украины</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Белоруссии</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Молдавии</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Азербайджана</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Казахстана</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Узбекистана</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Германии</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Франции</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Болгарии</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Испании</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Литвы</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Латвии</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Финляндии</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Израиля</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели США</p>
        <p class="link-block-title link-block-title--left">&#9658; Писатели Канады</p>
    </div>
    </template>

    <script>
    export default {
        name: "CitySelect",

        data(){
            return{
                folders: [
                    { name: 'Центральный ФО',
                    pages: [
                        {name: 'Москва и область'},
                        {name: 'Рязанская область'},
                        {name: 'Липецкая область'},
                        {name: 'Тамбовская область'},
                        {name: 'Белгородская область'},
                        {name: 'Курская область'},
                        {name: 'Ивановская область'},
                        {name: 'Ярославская область'},
                        {name: 'Калужская область'},
                        {name: 'Воронежская область'},
                        {name: 'Костромская область'},
                        {name: 'Тверская область'},
                        {name: 'Оровская область'},
                        {name: 'Смоленская область'},
                        {name: 'Тульская область'}
                    ]},

                    { name: 'Северо-Западный ФО',
                    pages: [
                        {name: 'Санкт-Петербург и Ленинградская область'},
                        {name: 'Мурманская область'},
                        {name: 'Архангельская область'},
                        {name: 'Калининградская область'},
                        {name: 'Республика Карелия'},
                        {name: 'Вологодская область'},
                        {name: 'Псковская область'},
                        {name: 'Новгородская область'},
                    ]},
                    { name: 'Южный ФО',
                    pages: [
                        {name: 'Ростовская область'},
                        {name: 'Краснодарский край'},
                        {name: 'Волгоградская область'},
                        {name: 'Республика Адыгея'},
                        {name: 'Астраханская область'},
                        {name: 'Город Севастополь'},
                        {name: 'Республика Крым'},
                        {name: 'Донецкая народная республика'},
                        {name: 'Луганская народная республика'},
                    ]},
                    { name: 'Северо-Кавказский ФО',
                    pages: [
                        {name: 'Северная Осетияй'},
                        {name: 'Алания'},
                        {name: 'Республика Дагестан'},
                        {name: 'Ставропольский край'},

                    ]},
                    { name: 'Уральский ФО',
                    pages: [
                        {name:'Cвердловская область'},
                        {name:'Тюменская область'},
                        {name:'Челябинская область'},
                        {name:'Курганская область'},
                    ]},
                    { name: 'Сибирский ФО',
                    pages: [
                        {name:'Республика Алтай'},
                        {name:'Алтайcкий край'},
                        {name:'Республика Хакассия'},
                        {name:'Красноярский край'},
                        {name:'Омская область'},
                        {name:'Кемеровская область'},
                        {name:'Иркутская область'},
                        {name:'Новосибирская область'},
                        {name:'Томская область'},
                    ]},
                    { name: 'Дальневосточный ФО',
                    pages: [
                        {name:'Магаданская область'},
                        {name:'Приморский крайсия'},
                        {name:'Cахалинская областьй'},
                    ]},
                ],

                federalOkrugVisible:false,
            }
      },
      methods: {
        toggle: function (idname) {
          if( document.getElementById(idname).style.display == "none" ){
            document.getElementById(idname).style.display = "inline";
          }else{
            document.getElementById(idname).style.display = "none";
          }
        },
      }
        }
    </script>