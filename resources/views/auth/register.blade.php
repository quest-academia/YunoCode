@extends('layouts.app')

@section('content')

    <div class="text-center blue-text">
        <h1 class="login_title text-center text-blue mt-5">新規登録</h1>
    </div>

    <div class="row mt-4 mb-1">
        <div class="col-sm-6 offset-sm-3">

        {!! Form::open(['route' => 'signup.post']) !!}
            <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                <h5>ユーザー名</h5>
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                <span class="text-danger help-block">{{$errors->first('name')}}</span>
            </div>

            <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                <h5>メールアドレス</h5>
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                <span class="text-danger help-block">{{$errors->first('email')}}</span>
            </div>

            <div class="form-group @if(!empty($errors->first('password'))) has-error @endif">
                <h5>パスワード</h5>
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <span class="text-danger help-block">{{$errors->first('password')}}</span>
            </div>

            <div class="form-group @if(!empty($errors->first('password_confirmation'))) has-error @endif">
                <h5>パスワード確認</h5>
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                <span class="text-danger help-block">{{$errors->first('password_confirmation')}}</span>
            </div>

            <div class="text-right text-blue">
                {!! Form::submit('登録', ['class' => 'btn btn-primary w-25 mt-2']) !!}
                {!! Form::close() !!}
            </div>

        </div>
    </div>

@endsection
