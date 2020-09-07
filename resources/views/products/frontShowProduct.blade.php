@extends('layouts.app')

@section('content')

    <div>

        <div class="mt-3">
        <a href="{{ action('FrontProductsController@index') }}">{!! Form::button('戻る',['class'=> 'btn btn-dark btn-sm']) !!}</a>
        </div>

        <h1 class="text-center blue-text mt-5">{{ $product->title }}</h1>

        <h4 class="text-right">講師：〇〇</h4>

            <div class="mt-5">

                <h5 class="mb-4">{{ $product->promotion }}</h4>

                <div class="text-center">
                    <img src="/productImage/{{ $product->main_image }}" width="250" height="250">
                </div>

                <div class="row mt-4">

                    @if($product->sub_image1)
                        <div class="text-right col-md-4">
                            <img src="/productImage/{{ $product->sub_image1 }}" width="150" height="150">
                        </div>
                    @endif

                    @if($product->sub_image2)
                        <div class="text-center col-md-4">
                            <img src="/productImage/{{ $product->sub_image2 }}" width="150" height="150">
                        </div>
                    @endif

                    @if($product->sub_image3)
                        <div class="text-left col-md-4">
                            <img src="/productImage/{{ $product->sub_image3}}" width="150" height="150">
                        </div>
                    @endif

                </div>

                <h5 class="mt-4">{{ $product->overview }}</h4>

                <h5 class="mt-4">・値段：{{ $product->price }}円</h5>

                @foreach($statuses as $key => $status)
                        @if($status->id == $product->status_id)
                            <h5 class="mt-3">・受講生受付状態：{{ $status->status_name }}</h5>
                        @endif
                @endforeach

                @foreach($categories as $key => $category)
                        @if($category->id == $product->category_id)
                            <h5 class="mt-3">・商品カテゴリー：{{ $category->category_name }}</h5>
                        @endif
                @endforeach

                <div class="text-center mt-5">
                    {!! Form::button('商品修正',['class'=> 'btn btn-primary w-25']) !!}
                </div>

            </div>

    </div>


@endsection