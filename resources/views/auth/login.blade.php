@extends('layouts.app')

@section('content')

    <div class="text-center blue-text">
        <h1 class="login_title text-center text-blue mt-5">ログイン</h1>
    </div>

    <div class="row mt-3 mb-1">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
            <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                <h5>メールアドレス</h5>
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                <span class="text-danger help-block">{{$errors->first('email')}}</span>
            </div>

            <div class="form-group　@if(!empty($errors->first('password'))) has-error @endif">
                <h5>パスワード</h5>  
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <span class="text-danger help-block">{{$errors->first('password')}}</span>
            </div>

        </div>
    </div>   

    <div class="text-center mt-3">

            <div class="text-center">
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary mt-2']) !!}
                {!! Form::close() !!}
            </div>
            
            <a class="btn btn-info mt-3" href="/signup">初めての方はこちらから</a>

    </div>
    

@endsection