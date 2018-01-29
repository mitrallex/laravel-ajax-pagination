<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>

        <style>
            body, html {
                min-height: 100%;
                background-color: #f5f5f5;
                margin: 0;
                padding: 0;
            }
            #app {
                padding: 40px 0 40px;
            }
            .content {
                padding: 10px 10px 20px;
                border-bottom: 1px solid #d3d3d3;
            }
            .content:last-child {
                border-bottom: none !important;
            }
            .pagination {
                margin-top: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container" id="app">
            <div class="box">
                    <article>
                        <div class="content" v-for="post in posts">
                            <h1>
                                @{{ post.title }}
                            </h1>
                            <p>
                                @{{ post.body }}
                            </p>
                        </div>
                    </article>

                    <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5" @newpage="change"></pagination>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
