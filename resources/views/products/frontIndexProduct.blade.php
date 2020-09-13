@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-3 mt-5 ">
    
            {!! Form::open(['route'=>'search', 'method' => 'post']) !!}

                <div class="form-group mt-1">
                    <div class="form-group">
                        <h6 class="inline-block">キーワード検索</h6>
                        {!! Form::text('overview',$request->overview,['class'=>'form-control input-sm']) !!}
                    </div>

                        <p class="inline-block">商品カテゴリー</p>
                        <select type="text" class="" name="category_id">
                            <option hidden>指定なし</option>
                            @foreach($categories as $key=>$category)
                                @if((!empty($request->category_id) && $request->category_id == $category->id) || old('category_id') == $category->id )
                                    <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endif
                            @endforeach
                        </select></br>
                    
                        <p class="inline-block mt-2">受講生受付状態</p>
                        <select type="text" class="form-group @if(!empty($errors->first('status_id'))) has-error @endif" name="status_id">
                            <option hidden>指定なし</option>
                            @foreach($statuses as $key=>$status)
                                @if((!empty($request->status_id) && $request->status_id == $status->id) || old('status_id') == $status->id )
                                    <option value="{{ $status->id }}") selected >{{ $status->status_name }}</option>
                                @else
                                    <option value="{{ $status->id }}")>{{ $status->status_name }}</option>
                                @endif
                            @endforeach
                        </select>

                    <div class="text-center">
                        {!! Form::submit('検索',['class'=> 'text-center btn btn-primary']) !!}
                    </div>

                </div>
            {!! Form::close() !!}
        </div>

        <dic class="col-md-9 mt-4">

        <h1 class="text-center blue-text">商品一覧画面</h1>

        @foreach($products as $key => $product)

        <div class="mt-4 border border-dark rounded">

            <div class="row m-1">

                <div class="mt-4 col-lg-3 text-center">
                    <img src="/productImage/{{ $product->main_image }}" width="150" height="150">
                </div>

                <div class="col-lg-9">

                    @foreach($statuses as $key => $status)
                        @if($status->id == $product->status_id)
                            <p class="text-right mb-0">受講生受付状態：{{ $status->status_name }}</p>
                        @endif
                    @endforeach

                    <h2 class="inline-block"><a href="{{ action('FrontProductsController@show', $product->id) }}">{{ $product->title }}</a></h2>
                    
                    <p class="text-right mb-0">講師：〇〇</p>

                    <h6>{{ $product->promotion }}</h6>

                    <p class="mb-0">値段：{{ $product->price }}円</p>

                    @foreach($categories as $key => $category)
                        @if($category->id == $product->category_id)
                            <p class="text-right mb-0">商品カテゴリー：{{ $category->category_name }}</p>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

        @endforeach
        
        <div class="d-flex justify-content-center m-4">

            {{ $products->appends(request()->input())->links() }}
            
        </div>

        </div>
    </div>



@endsection