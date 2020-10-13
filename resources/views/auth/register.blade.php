@extends('layouts.app')

@section('content')

    <div class="text-center blue-text">
        <h1 class="login_title text-center text-blue mt-5">新規登録</h1>
    </div>

    <div class="row mt-4 mb-1">
        <div class="col-sm-6 offset-sm-3">

            <div class="form-group">
                <h5>ユーザー名</h5>
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <h5>メールアドレス</h5>
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <h5>パスワード</h5>
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <h5>パスワード確認</h5>
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>

            <div class="text-right text-blue btn-lg">
                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-lg w-25 mt-2']) !!}
                {!! Form::close() !!}
            </div>

        </div>
    </div>

@endsection
