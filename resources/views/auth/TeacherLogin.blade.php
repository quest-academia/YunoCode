@extends('layouts.app')

@section('content')

    <div class="text-center navy-text">
        <h1 class="login_title text-center text-navy mt-5">講師ログイン</h1>
    </div>

    <div class="row mt-3 mb-1">
        <div class="col-sm-12">

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

        <div class="text-center col-sm-12">

                {!! Form::submit('ログイン', ['class' => 'btn btn btn-primary mt-2']) !!}
                {!! Form::close() !!}

              <p class="mt-3">{!! link_to_route('/', '初めての方はこちらから') !!}</p>
              {!! Form::close() !!}
        </div>
    </div>
    
@endsection

