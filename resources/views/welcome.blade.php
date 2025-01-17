<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="color: orangered;">
                    API RESTful Laravel

                    <br>
                </div>
                <div class="links" >
                    <a href="" style="font-size: 32px; color: orange;">Exigencias para Testar
                        <br>
                    </a>
                    <p >
                    <div class="content" style="text-align: left; color: black; font-size: 20px; font-weight: bold; " >
                        git clone https://github.com/FelipePAugusto/agendaFelipeAugusto.git
                        <br>http://127.0.0.1:8080/phpmyadmin
                        <br>Criar banco com o nome: agendaFelipeAugusto
                        <br>php artisan migrate
                        <br>php artisan db:seed
                    </div>
                    </p>
                </div>
                <div class="links" >
                    <a href="" style="font-size: 32px; color: orange;">Usar os seguintes URL's para testar a API RESTful
                        <br>
                    </a>
                    <p >
                        <div class="content" style="text-align: left; color: black; font-size: 20px; font-weight: bold; " >
                            GET - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos
                        <br>POST - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/salvar
                        <br>PUT - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/atualizar/2
                        <br>DELETE - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/deletar/4
                        <br>
                        <br>GET - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/mensagem/listar/3
                        <br>POST - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/mensagem/adicionar/1
                        <br>PUT - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/mensagem/modificar/5/10
                        <br>DELETE - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/mensagem/excluir/12
                        </div>
                    </p>
                </div>

            </div>
        </div>
    </body>
</html>
