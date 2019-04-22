<template>
    <div>
        <div v-show="alerts.message !== ''">
            <ul class="alert alert-danger">
                <li v-for="(value, key) in alerts.errors">{{key}}: <span v-for="error in value">{{error}} </span></li>
            </ul>
        </div>
        <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1>Добавление нового автора</h1>
                    <router-link to="/authors" class="btn btn-default">Назад</router-link>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form v-on:submit="saveForm()">
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Имя автора</label>
                                <input type="text" v-model="author.name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Фамилия автора</label>
                                <input type="text" v-model="author.surname" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Выберите книги автора</label>
                                <select  v-model="author.books" multiple>
                                    <option v-for="book in books" :value="book.id">{{book.title}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-success">Добавить</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "authorCreate",
        data: function () {
            return {
                author: {
                    name: '',
                    surname: '',
                    books: [],
                },
                books: [],
                alerts: {
                    message:'',
                    errors:{},
                },
            }
        },
        mounted(){
            this.getBooks();
        },
        methods: {
            saveForm: function() {
                event.preventDefault();
                console.log(this.author);
                axios.post('/api/v1/authors', this.author)
                    .then((resp) => {
                        this.$router.push({name: 'indexAuthor'});
                    })
                    .catch((resp) => {
                        if(resp.response.status === 422) {
                            this.alerts = resp.response.data;
                        }
                    })
            },
            getBooks: function(){
                axios.get(`/api/v1/books/list`).then((response) => {
                    this.books = response.data;
                }).catch((response) => {
                    alert('Не удалось получить список авторов');
                });
            },
        }
    }
</script>

<style scoped>

</style>
