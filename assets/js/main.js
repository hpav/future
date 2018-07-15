window.onload = function () {

    var app = new Vue({
        el: '.js-main-app',
        data: {
            name: "",
            message: "",
            comments: [],
        },
        methods: {
            loadComments: function () {
                var that = this;
                $.ajax(
                    "/_ajax/comments.php",
                    {
                        method: "POST",
                        data: {
                            type: "get",
                        },
                        success: function (result) {
                            that.comments = result.comments;
                        },
                        error: function () {
                            new Noty({
                                type: "error",
                                text: 'Ошибка загрузки',
                                timeout: 3000,
                            }).show();
                        },
                    }
                );
            },
            addComment: function () {
                var that = this;
                var name = this.$refs.name.value;
                var message = this.$refs.message.value;

                if (name.length <= 0) {
                    new Noty({
                        type: "error",
                        text: 'Введите имя',
                        timeout: 3000,
                    }).show();

                    return;
                }

                if (message.length <= 0) {
                    new Noty({
                        type: "error",
                        text: 'Введите сообщение',
                        timeout: 3000,
                    }).show();

                    return;
                }

                $.ajax(
                    "/_ajax/comments.php",
                    {
                        method: "POST",
                        data: {
                            type: "add",
                            name: name,
                            message: message,
                        },
                        success: function (result) {
                            if (result.ok !== true) {
                                new Noty({
                                    type: "error",
                                    text: result.error,
                                    timeout: 3000,
                                }).show();
                                return;
                            }

                            new Noty({
                                type: "success",
                                text: 'Сообщение отправленно',
                                timeout: 3000,
                            }).show();

                            that.$refs.name.value = "";
                            that.$refs.message.value = "";

                            that.loadComments();
                        },
                        error: function () {
                            new Noty({
                                type: "error",
                                text: 'Ошибка отправки',
                                timeout: 3000,
                            }).show()
                        }
                    }
                );
            },
        },
        mounted: function () {
            this.loadComments()
        },
    })
};
