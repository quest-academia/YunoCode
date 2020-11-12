@extends('layouts.app')

@section('content')

    <div>

        <h1 class="text-center blue-text mt-5">商品修正画面</h1>

        {!! Form::open(['route'=>'search', 'enctype'=>'multipart/form-data']) !!}

            <div class="form-group mt-5">

                <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                    <h4 style="display:inline;">・商品名<span class="display-5"> (32文字以内)</span></h4>
                    {!! Form::text('title',$product->title,['class'=>'form-control ']) !!}
                    <span class="text-danger help-block">{{$errors->first('title')}}</span>
                </div>
                
                <div class="form-group @if(!empty($errors->first('promotion'))) has-error @endif">
                    <h4>・商品PR(128文字以内)</h4>
                    {!! Form::textarea('promotion',$product->promotion,['class'=>'form-control']) !!}
                    <span class="text-danger help-block">{{$errors->first('promotion')}}</span>
                </div>

                <div class="form-group @if(!empty($errors->first('overview'))) has-error @endif">
                    <h4 class="mt-3">・商品概要説明(256文字以内)</h4>
                    {!! Form::textarea('overview',$product->overview,['class'=>'form-control']) !!}
                    <span class="text-danger help-block">{{$errors->first('overview')}}</span>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <h4>・商品画像</h4>
                    </div>

                    <div class="form-group @if(!empty($errors->first('main_image'))) has-error @endif col-md-12">
                        <h5>メイン画像</h5>
                        <img src="/productImage/{{ $product->main_image }}" width="250" height="250"></br>
                        {!! Form::file('main_image',null,['class'=>'form-control pt-3']) !!}</br>
                        <span class="text-danger help-block">{{$errors->first('main_image')}}</span>
                        </br>
                    </div>

                    <div class="form-group @if(!empty($errors->first('sub_image1'))) has-error @endif col-md-4">
                        <h5>サブ画像1</h5>
                        <img src="/productImage/{{ $product->sub_image1 }}" width="150" height="150">
                        {!! Form::file('sub_image1',null,['class'=>'form-control pt-3']) !!}</br>
                        <span class="text-danger help-block">{{$errors->first('sub_image1')}}</span>
                        </br>
                    </div>

                    <div class="form-group @if(!empty($errors->first('sub_image2'))) has-error @endif col-md-4">
                        <h5>サブ画像2</h5>
                        <img src="/productImage/{{ $product->sub_image2 }}" width="150" height="150">
                        {!! Form::file('sub_image2',null,['class'=>'form-control pt-3']) !!}</br>
                        <span class="text-danger help-block">{{$errors->first('sub_image2')}}</span>
                        </br>
                    </div>

                    <div class="form-group @if(!empty($errors->first('sub_image3'))) has-error @endif col-md-4">
                        <h5>サブ画像3</h5>
                        <img src="/productImage/{{ $product->sub_image3 }}" width="150" height="150">
                        {!! Form::file('sub_image3',null,['class'=>'form-control pt-3']) !!}</br>
                        <span class="text-danger help-block">{{$errors->first('sub_image3')}}</span>
                        </br>
                    </div>

                </div>

                <div class="row">

                    <div class="cdol-m-12">
                        <h4 class="">・値段</h4>
                    </div>

                    <div class="form-group @if(!empty($errors->first('price'))) has-error @endif col-md-6">
                        <div class="inline-block">
                            {!! Form::text('price',$product->price,['class'=>'form-control']) !!}
                        </div>
                        <div class="inline-block">
                            <p>円</p>
                        </div>
                        <div>
                            <span class="text-danger help-block">{{$errors->first('price')}}</span>
                        </div>
                    </div>

                    <div class="col-md-6"></div>

                </div>

                <div class="form-group @if(!empty($errors->first('category_id'))) has-error @endif">
                    <h4 class="">・商品カテゴリー</h4>
                    <select type="text" class="" name="category_id">
                        @foreach($categories as $key=>$category)
                        <option hidden>{{ $category->category_name }}</option>
                            @if((!empty($request->category_id) && $request->category_id == $category->id) || old('category_id') == $category->id )
                                <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endif
                        @endforeach
                    </select></br>
                    <span class="text-danger help-block">{{$errors->first('category_id')}}</span>
                </div>

                <div class="form-group @if(!empty($errors->first('category_id'))) has-error @endif">
                    <h4 class="">・受講生受付状態</h4>
                    <select type="text" class="form-group @if(!empty($errors->first('status_id'))) has-error @endif" name="status_id">
                        @foreach($statuses as $key=>$status)
                        <option hidden>{{ $status->status_name }}</option>
                            @if((!empty($request->status_id) && $request->status_id == $status->id) || old('status_id') == $status->id )
                                <option value="{{ $status->id }}") selected >{{ $status->status_name }}</option>
                            @else
                                <option value="{{ $status->id }}")>{{ $status->status_name }}</optison>
                            @endif
                        @endforeach
                    </select></br>
                        <span class="text-danger help-block">{{$errors->first('status_id')}}</span>
                </div>
                
                <div class="text-center">
                <a class="btn btn-danger mt-3 w-25" href="">削除</a>
                <span style="margin-left:100px"><a class="btn btn-primary mt-3 w-25" href="">修正</a>
                </div>

            </div>

        {!! Form::close() !!}

    </div>

@endsection