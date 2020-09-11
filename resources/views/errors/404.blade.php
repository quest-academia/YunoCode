@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="text-center">
      
      <h2 class="m-5">お探しのページは見つかりませんでした...</h2>
      <a href="{{ route('/') }}">{!! Form::button('ホームへ戻る',['class'=> 'btn btn-primary w-25']) !!}</a>
    
    </div>
  </div>
@endsection