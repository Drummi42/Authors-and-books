<template>
    <div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Админка библиотеки</h1>
                <a href="/" class="btn btn-primary">Назад</a>
            </div>
            <div class="card-body">
                <router-link :to="{name: 'indexAuthor'}" class="btn btn-success">Настройка авторов</router-link>
                <router-link :to="{name: 'indexBook'}" class="btn btn-success">Настройка книг</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>
