<template>
    <div id="navbar">
        <ul class="navbar__list">
            <li> <button class="li-btn"> Главная</button></li>
            <li> <button  class="li-btn">Новости и объявления</button></li>
            <li> <button  class="li-btn"> Круглый стол</button></li>
            <li> <button  class="li-btn"> Лента рецензий</button></li>
            <li> <button  class="li-btn"> Ленты форумов</button></li>
            <li> <button  class="li-btn"> Обзоры и итоги конкурсов</button></li>
            <li> <button  class="li-btn"> Диалоги, дискуссии, обсуждения</button></li>
            <li> <button  class="li-btn"> Избранные произведения</button></li>
            <li> <button  class="li-btn"> Литобъединения и союзы писателей</button></li>
            <li> <button  class="li-btn"> Литературные салоны, гостинные, студии, кафе</button></li>
            <li> <button  class="li-btn"> Kонкурсы и премии</button>    </li>
            <li> <button  class="li-btn"> Проекты критики</button></li>
            <li> <button  class="li-btn"> Новости Литературной сети</button></li>
            <li> <button  class="li-btn"> Журналы</button></li>
            <li> <button  class="li-btn"> Издательские проекты</button></li>
            <li> <button  class="li-btn"> Издать книгу</button></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Menu"
}
</script>

<style scoped>
#navbar {
    background-color: #C6DCF2;
    margin: 0 auto;
}

#navbar ul {
    padding: 0 1px;
    list-style: none;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    margin: 0;
}
.li-btn{
    background-color: #abcdf066;
    width: 100%;
    height: 40px;
    border: 1px solid white;
    font-size: 12px;
    padding: 0 5px;
    cursor: pointer;
    font-weight: 600;
    color: #3b5e97;
    border-radius: 5px;
}

#navbar ul li {
    border-top: solid 1px #e3e3e3;
    padding: 5px;
    font-size: 13px;
}

#navbar ul li a {
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    line-height: 26px;
    font-weight: 300;
    color: white;
    text-decoration: none;
}


</style>
