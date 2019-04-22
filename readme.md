# Тестовый проект Laravel 5.8 + Vuejs

Для `watch-poll` нужно расширение `vue-router`

Тестовые данные
`php artisan migrate --seed`

## Что реализует?

1. Сущности авторы и книги
2. Административную часть
    - a. CRUD операции для авторов и книг
    - b. вывод списка книг с обязательным указанием имени автора в списке
    - c. вывод списка авторов с указанием кол-ва книг
3. Публичную часть сайта с отображение авторов и их книг (простой вывод списка на странице)
4. Выдачу данных в формате json по RESTful протоколу отдельным контроллером 
    - a. GET /api/v1/books/list получение списка книг с именем автора 
    - b. GET /api/v1/books/by-id получение данных книги по id
    - c. POST /api/v1/books/update обновление данных книги
    - d. DELETE /api/v1/books/id удаление записи книги из бд
    
### Комментарий
Список публичной части сделан через рендеринг страницы ларавелем. Вся админ. часть сделана на vue компонентах 
(пагинация тоже). Первое знакомство с Vue в составе laravel. Авторы и Книги связаны многие-ко-многим,
 но добавление авторов к книгам при создании книги не сделано.

#### Что можно улучшить
- Массивы выдачи для JSON. Убрать ненужные поля, структурировать формат выдачи.
- Написать пагинацию через vue-router, а не через компонент.
- Оптимизировать компоненты(имхо они совсем не связаны между собой).
- В ajax-запросы добавить обработку ошибок возвращаемых API.
- Поправить юзабилити форм и показ ошибок.
