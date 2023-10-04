<template>
    <div id="homepage" class="homepage-container">
        <div class="homepage__user">
            <h3>ИМЯ</h3>
            <ul>
                <li>Количество произведений: </li>
                <li>Получено рецензий: </li>
                <li>Написано рецензий: </li>
                <hr>
                <li>Мои произведения читали: </li>

            </ul>
        </div>
        <div class="homepage__composition">
            <h3>Мои произведения</h3>
            <div class="composition-table">
                <div class="composition-table-title">
                    <div class="composition-number">№</div>
                    <div class="composition-name">Название произведения</div>
                    <div class="composition-genre">Жанр</div>
                </div>
                <ul>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HomePage"
}
</script>

<style scoped>
#homepage {
    background-color: #C6DCF2;
    margin:0 auto;
}
#homepage h3 {
    text-align: center;
    margin: 0;
    border: 1px solid;
    background-color: #3b5e97;
    font-size: 20px;
    padding: 5px;
}

#homepage ul {
    padding: 20px;
    list-style: none;
    margin: 0;
    background-color: #eaf2fa;
}

.homepage-container{
    width: 1000px;
}
.composition-table-title{
    display: flex;
    justify-content: space-between;
    padding:10px;
    background-color: #C6DCF2;
}

</style>
