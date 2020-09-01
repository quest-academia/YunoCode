<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Category;
use App\Product;
use App\Http\Requests\CreateProductRequest;

class FrontProductsController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('id')->get();
        $statuses = Status::orderBy('id')->get();

        $data=[
            'categories' => $categories,
            'statuses' => $statuses,
        ];

        return view('products.frontCreateProduct',$data);
    }

    public function store(CreateProductRequest $request)
    {

        $product = new Product();

        $product->title = $request->title;
        $product->promotion = $request->promotion;
        $product->overview = $request->overview;

        $mainImageName = time().'.'.$request->main_image->getClientOriginalExtension();
        $target_path = public_path('/productImage/');
        $request->main_image->move($target_path,$mainImageName);
        $product->main_image = $mainImageName;

        if($request->sub_image1){
            $subImage1Name = time().'.'.$sub_image1->getClientOriginalExtension();
            $target_path = public_path('/image/');
            $sub_image1->move($target_path,$subImage1Name);
            $product->sub_image1 = $subImage1Name;
        }

        if($request->sub_image2){
            $subImage2Name = time().'.'.$sub_image2-getClientOriginalExtension();
            $target_path = public_path('/image/');
            $sub_image2->move($target_path,$subImage2Name);
            $product->sub_image2 = $subImage2Name;
        }

        if($request->sub_image3){
            $subImage3Name = time().'.'.$sub_image1->getClientOriginalExtension();
            $target_path = public_path('/image/');
            $sub_image3->move($target_path,$subImage3Name);
            $product->sub_image3 = $subImage3Name;
        }

        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->status_id = $request->status_id;

        $product->save();
        
        return back();
    }

    
}
