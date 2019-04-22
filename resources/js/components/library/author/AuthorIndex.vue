<template>
    <div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Авторы книг</h1>
                <div>
                    <router-link :to="{name: 'indexLibrary'}" class="btn btn-default">Назад</router-link>
                    <router-link :to="{name: 'createAuthor'}" class="btn btn-success">Добавить автора</router-link>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Список книг</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="elem, index in authors.data">
                        <td>{{elem.name}}</td>
                        <td>{{elem.surname}}</td>

                        <td><span v-for="book in elem.books">"{{book.title}}"<br/></span></td>
                        <td>
                            <router-link :to="{name: 'editAuthor', params: {id: elem.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteAuthor(elem.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <vuePagination :pagination="authors"
                                @paginate="getAuthors()"
                                :offset="4"></vuePagination>
            </div>
        </div>
    </div>
</template>

<script>
    import VuePagination from './../../Pagination.vue';
    export default {
        name: "indexAuthor",
        components: {
            VuePagination
        },
        data: function() {
            return {
                authors: {},
            }
        },
        mounted() {
            this.getAuthors();
        },
        methods: {
                getAuthors: function(){
                    axios.get(`/api/v1/authors/?page=${this.authors.current_page}`).then((response) => {
                        this.authors = response.data;
                    }).catch((response) => {
                        alert('Не удалось получить список авторов');
                    });
                },
                deleteAuthor: function(authorId, index){
                if (confirm("Действительно хотите удалить запись?")) {
                    axios.delete('/api/v1/authors/' + authorId)
                        .then((response) => {
                            this.authors.data.splice(index, 1);
                        })
                        .catch((response) => {
                            alert("Не удалось удалить автора");
                        });
                }
            }
        }
    }
</script>

<style scoped>

</style>
