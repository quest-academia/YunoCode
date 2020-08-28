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
                   <img src="./image/pc.png" width="150" height="150" alt="">
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
                   <img src="./image/chat.png" width="150" height="150" alt="">
                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="card m-2">

                <div class="text-center text-title mt-4 mb-3">
                    <h3 class="blue-text">１対１でサポート</br></h3>
                </div>

                <div class="text-center mb-4">
                   <img src="./image/teacher.png" width="150" height="150" alt="">
                </div>

            </div>

        </div>
        
    </div>

    </div>

@endsection
