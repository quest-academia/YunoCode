<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Category;
use App\Product;
use App\Http\Requests\CreateProductRequest;

class FrontProductsController extends Controller
{
    public function index()
    {
        //全データ取得
        $categories = Category::orderBy('id')->get();
        $statuses = Status::orderBy('id')->get();
        //10件ごとに表示する
        $products = Product::orderBy('id','desc')->paginate(10);

        $data=[
            'categories' => $categories,
            'statuses' => $statuses,
            'products' => $products,
        ];

        return view('products.frontIndexProduct',$data);
    }

    public function show($id)
    {
        //全データ取得
        $categories = Category::orderBy('id')->get();
        $statuses = Status::orderBy('id')->get();
        $product = Product::find($id);

        $data=[
            'categories' => $categories,
            'statuses' => $statuses,
            'product' => $product,
        ];

        return view('products.frontShowProduct',$data);
    }

    public function create()
    {
        //プルダウン用のデータ取得
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

        // メイン画像を指定のパスに保存する
        $mainImageName = time().'.'.$request->main_image->getClientOriginalExtension();
        $targetPath = public_path('/productImage/');
        $request->main_image->move($targetPath,$mainImageName);
        $product->main_image = $mainImageName;

        // サブ画像１が存在すれば、サブ画像１を指定のパスに保存する
        if($request->sub_image1){
            $subImage1Name = time().'.'.$request->sub_image1->getClientOriginalExtension();
            $targetPath = public_path('/image/');
            $request->sub_image1->move($targetPath,$subImage1Name);
            $product->sub_image1 = $subImage1Name;
        }

        // サブ画像２が存在すれば、サブ画像２を指定のパスに保存する
        if($request->sub_image2){
            $subImage2Name = time().'.'.$request->sub_image2->getClientOriginalExtension();
            $targetPath = public_path('/image/');
            $request->sub_image2->move($targetPath,$subImage2Name);
            $product->sub_image2 = $subImage2Name;
        }

        // サブ画像３が存在すれば、サブ画像３を指定のパスに保存する
        if($request->sub_image3){
            $subImage3Name = time().'.'.$request->sub_image3->getClientOriginalExtension();
            $targetPath = public_path('/image/');
            $request->sub_image3->move($targetPath,$subImage3Name);
            $product->sub_image3 = $subImage3Name;
        }

        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->status_id = $request->status_id;

        $product->save();
        
        return back();
    }

    
}
