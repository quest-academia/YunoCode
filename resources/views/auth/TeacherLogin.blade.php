<<<<<<< HEAD
=======
@extends('layouts.app')

>>>>>>> develop
@section('content')

    <div class="text-center blue-text">
        <h1 class="login_title text-center text-blue mt-5">講師ログイン</h1>
    </div>

    <div class="row mt-3 mb-1">
        <div class="col-sm-6 offset-sm-3">

              <div class="form-group">
                  {!! Form::label('email', 'メールアドレス') !!}
                  {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
              </div>

              <div class="form-group">
                  {!! Form::label('password', 'パスワード') !!}
                  {!! Form::password('password', ['class' => 'form-control']) !!}
              </div>

          </div>
        </div>

<<<<<<< HEAD
        <div class="text-center mt-3">

        <div class="text-center">
                {!! Form::submit('ログイン', ['class' => 'btn btn btn-primary mt-2']) !!}
                {!! Form::close() !!}
        </div>

            <a class="btn btn-info mt-3" href="/">初めての方はこちらから</a>
        
    </div>
=======
        <div class="text-center  mt-3">

          <div class="text-center">
                {!! Form::submit('ログイン', ['class' => 'btn btn btn-primary mt-2']) !!}
                {!! Form::close() !!}
          </div>

              <a class="btn btn-info mt-3" href="/">初めての方はこちらから</a>
        
        </div>
>>>>>>> develop
    
@endsection

