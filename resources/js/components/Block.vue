<template>
    <div id="block__news" class="container">
        <h3>Новости портала</h3>
        <ul class="news__list">
            <li> &#9658; ПРИГЛАШЕНИЕ на конкурс «Рябина_на_коньяке»</li>
            <br>
            <li> &#9658; С днем рождения, дорогой портал! Поздравляем с памятной датой всех, кому ты дорог!</li>
            <br>
            <li> &#9658; Как за пять минут творчества обеспечить себе суточные 50 грамм коньку? Читайте об этом в дежурном блице Прокурора Андреева.</li>
            <br>
            <li> &#9658; О новом конкурсе, создании Литературных объединений и оплачиваемой работе на портале и в МСП. Приглашаем к обсуждению этого материала, опубликованнного на Круглом столе портала.</li>

        </ul>
    </div>
</template>

<script>
export default {
    name: "Block"
}
</script>

<style scoped>
#block__news {
    position: absolute;
    background-color: #C6DCF2;
    margin: 0 auto;
    width: 970px;
    left: 220px;


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
