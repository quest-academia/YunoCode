<<<<<<< HEAD
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
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
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
=======
@extends('layouts.app')

@section('content')

    <div class="center">

        <div class="text-center mb-5">

            <h1 class="blue-text">現役エンジニアが<br/>
            あなたの学習をサポートします！</h1>

            <h5><br/>
            このサービスは現役のエンジニア講師がプログラミングやエンジニアとして必要な学習をサポートします。</br>
            あなたに合うコースを選んでエンジニアに必要なスキルを習得しましょう！</h5>
        </div>

    
    <div class="row">
        <div class="col-md-4">
            <div class="card m-2">

                <div class="text-center text-title mt-2">
                    <h3 class="blue-text">講師は現役の</br>
                    エンジニアのみ</h3>
                </div>

                <div class="text-center mb-4">
                   <img src="./image/image_pc.png" width="150" height="150" alt="">
                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="card m-2">

                <div class="text-center text-title mt-2">
                    <h3 class="blue-text">チャットで</br>
                    いつでも質問可能</h3>
                </div>

                <div class="text-center mb-4">
                   <img src="./image/image_chat.png" width="150" height="150" alt="">
                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="card m-2">

                <div class="text-center text-title mt-4 mb-3">
                    <h3 class="blue-text">1対１でサポート</br></h3>
                </div>

                <div class="text-center mb-4">
                   <img src="./image/image_teacher.png" width="150" height="150" alt="">
                </div>

            </div>

        </div>
        
    </div>

    </div>

@endsection
>>>>>>> 3de543a153b3cf386671cb6f118aaf5cd5f29d0c
