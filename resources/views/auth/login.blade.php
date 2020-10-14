@extends('layouts.app')

@section('content')

    <div class="text-center blue-text">
        <h1 class="login_title text-center text-blue mt-5">ログイン</h1>
    </div>

    <div class="row mt-3 mb-1">
        <div class="col-sm-4 offset-sm-4">

            <div class="form-group">
                <h5>メールアドレス</h5>
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <h5>パスワード</h5>  
                    {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

        </div>
    </div>   

    <div class="text-center col-sm-4 offset-sm-4">

                <div class="text-center btn-lg">
                {!! Form::submit('ログイン', ['class' => 'btn btn-lg btn-primary mt-2']) !!}
                    {!! Form::close() !!}
                </div>
    
                <div class="text-center btn-sm">
                    {!! Form::submit('初めての方はこちらから', ['class' => 'btn btn-sm btn-info mt-2']) !!}
                    {!! Form::close() !!}
                </div> 
    </div>

@endsection