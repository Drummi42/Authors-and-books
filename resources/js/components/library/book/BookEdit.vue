<template>
    <div>
        <div v-show="alerts.message !== ''">
            <ul class="alert alert-danger">
                <li v-for="(value, key) in alerts.errors">{{key}}: <span v-for="error in value">{{error}} </span></li>
            </ul>
        </div>
        <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1>Книга "{{book.title}}"</h1>
                    <router-link to="/books" class="btn btn-default">Назад</router-link>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form v-on:submit="saveForm()" class="col-8">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label class="control-label">Название книги</label>
                                <input type="text" v-model="book.title" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <label class="control-label">Описание</label>
                                <textarea v-model="book.description" class="form-control" style="height: 150px;"></textarea>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-success">Изменить</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "bookEdit",
        data: function () {
            return {
                bookId: null,
                book: {
                    title: '',
                    description: '',
                },
                alerts: {
                    message:'',
                    errors:{},
                },
            }
        },
        mounted(){
          this.bookId = this.$route.params.id;
          console.log(this.bookId);
          axios.get('/api/v1/books/' + this.bookId).then((resp) => {
             this.book = resp.data;
          }).catch((resp) => {
              console.log(resp);
              alert('Не удалось получить данные о книге');
          });
        },
        methods: {
            saveForm() {
                event.preventDefault();

                axios.patch('/api/v1/books/'+ this.bookId, this.book)
                    .then((resp) => {
                        this.$router.replace('/books');
                    })
                    .catch((resp) => {
                        if(resp.response.status === 422) {
                            this.alerts = resp.response.data;
                        }
                    });
            }
        }
    }
</script>

<style scoped>

</style>
