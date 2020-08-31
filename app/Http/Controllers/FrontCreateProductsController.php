<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Category;
use App\Product;

class FrontCreateProductsController extends Controller
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

    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|max:32',
            'promotion' => 'required|max:128',
            'overview' => 'required|max:256',
            'main_image' => 'required|mimes:jpeg,jpg,bmp,png,gif|max:4096',
            'sub_image1' => 'mimes:jpeg,jpg,bmp,png,gif|max:4096',
            'sub_image2' => 'mimes:jpeg,jpg,bmp,png,gif|max:4096',
            'sub_image3' => 'mimes:jpeg,jpg,bmp,png,gif|max:4096',
            'price' => 'required|integer|digits_between:0,32',
            'category_id' => 'required|integer',
            'status_id' => 'required|integer',
        ],
        [
            'price.digits_between' => '値段は32桁以内で入力してください',
            'category_id.require' => '選択必須項目です。',
            'category_id.integer' => '選択項目から選んでください。',
            'status_id.require' => '選択必須項目です。',
            'status_id.integer' => '選択項目から選んでください。',
        ]);

        if($main_image = $request->main_image){
            $mainImageName = time().'.'.$main_image->getClientOriginalName();
            $target_path = public_path('/productImage/');
            $main_image->move($target_path,$mainImageName);
        } else {
            $name="";
        }

        if($sub_image1 = $request->sub_image1){
            $subImage1Name = time().'.'.$sub_image1->getClientOriginalName();
            $target_path = public_path('/image/');
            $sub_image1->move($target_path,$subImage1Name);
        } else {
            $subImage1Name="";
        }

        if($sub_image2 = $request->sub_image2){
            $subImage2Name = time().'.'.$sub_image2->getClientOriginalName();
            $target_path = public_path('/image/');
            $sub_image2->move($target_path,$subImage2Name);
        } else {
            $subImage2Name="";
        }

        if($sub_image3 = $request->sub_image3){
            $subImage3Name = time().'.'.$sub_image1->getClientOriginalName();
            $target_path = public_path('/image/');
            $sub_image3->move($target_path,$subImage3Name);
        } else {
            $subImage3Name="";
        }

        Product::create([
            'title' => $request->title,
            'promotion' => $request->promotion,
            'overview' => $request->overview,
            'main_image' => $mainImageName,
            'sub_image1' => $subImage1Name,
            'sub_image2' => $subImage2Name,
            'sub_image3' => $subImage3Name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'status_id' => $request->status_id,
        ]);

        return back();
    }
}
