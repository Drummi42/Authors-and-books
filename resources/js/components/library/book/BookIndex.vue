<template>
    <div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Книги</h1>
                <div>
                    <router-link :to="{name: 'indexLibrary'}" class="btn btn-default">Назад</router-link>
                    <router-link :to="{name: 'createBook'}" class="btn btn-success">Добавить книгу</router-link>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Авторы</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="elem, index in books.data">
                        <td>{{elem.title}}</td>

                        <td><span v-for="author in elem.authors">"{{author.name}} {{author.surname}}"<br/></span></td>
                        <td>
                            <router-link :to="{name: 'editBook', params: {id: elem.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteBook(elem.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <vuePagination :pagination="books"
                                @paginate="getBooks()"
                                :offset="4"></vuePagination>
            </div>
        </div>
    </div>
</template>

<script>
    import VuePagination from './../../Pagination.vue';
    export default {
        name: "bookIndex",
        components: {
            VuePagination
        },
        data: function() {
            return {
                books: {},
            }
        },
        mounted() {
            this.getBooks();
        },
        methods: {
            getBooks: function(){
                axios.get(`/api/v1/books/?page=${this.books.current_page}`).then((response) => {
                    this.books = response.data;
                }).catch((response) => {
                    alert('Не удалось получить список авторов');
                });
            },
            deleteBook: function(bookId, index){
                if (confirm("Действительно хотите удалить запись?")) {
                    axios.delete('/api/v1/books/' + bookId)
                        .then((response) => {
                            this.books.data.splice(index, 1);
                        })
                        .catch((response) => {
                            alert("Не удалось удалить книгу");
                        });
                }
            }
        }
    }
</script>

<style scoped>

</style>
