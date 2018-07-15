<html>
<head>
    <title>Комментарии</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.js"></script>
    <script src="/assets/js/main.js"></script>

</head>
<body>

<div class="header-block">
    <div class="text-block">
        <p>Телефон: (499) 340-94-71</p>
        <p>Email: <a href="mailto:info@future-group.ru">info@future-group.ru</a></p>
        <h2>Комментарии</h2>
    </div>
    <img src="/assets/img/logo.png">
</div>
<div class="main js-main-app">
    <template v-if="comments.length > 0">
        <div class="comment-list js-comments-list">
            <div class="comment-item"
                 v-for="comment in comments"
            >
                <div class="message-title">
                    <span class="user-name">{{comment.name}}</span>
                    <span class="date">{{comment.date}}</span>
                </div>
                <div class="message-body">
                    {{comment.message}}
                </div>
            </div>

        </div>
    </template>
    <template v-else>
        <div class="comment-list">
            <span>Комментарии отсуствуют</span>
        </div>
    </template>
    <hr>
    <div class="form-block">
        <h2>Оставить комментарий</h2>
        <form>
            <label for="name">Ваше имя:</label>
            <input id="name" ref="name" required><br>
            <label for="message">Ваш комментарий:</label>
            <textarea id="message" ref="message"></textarea><br>
            <button @click.prevent="addComment">
                Отправить
            </button>
        </form>
    </div>
</div>
<div class="footer-block">
    <img src="/assets/img/logo.png">

    <div class="text-block">
        <p>Телефон: (499) 340-94-71</p>
        <p>Email: <a href="mailto:info@future-group.ru">info@future-group.ru</a></p>
        <p>Адрес: <a href="https://yandex.ru/maps/-/CBuJqEBTTD" target="_blank">115088 Москва, ул. 2-я Машиностроения, д. 7 стр.1</a></p>
    </div>
</div>
</body>
</html>


