<template>
    <div id="block__news" class="container">
        <h3>Новости портала</h3>
        <ul class="news__list">
            <li> Главная</li>
            <li> Главная</li>
            <li> Главная</li>
            <li> Главная</li>
            <li> Главная</li>
            <li> Главная</li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Menu"
}
</script>

<style scoped>
#block__news {
    background-color: #C6DCF2;
    margin:0 auto;
}
#block__news h3 {
    text-align: center;
    margin: 0;
    border: 1px solid;
    background-color: #3b5e97;
    font-size: 20px;
    padding: 5px;
}

#block__news ul {
    padding: 20px;
    list-style: none;
    margin: 0;
    background-color: #eaf2fa;
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
