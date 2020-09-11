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

    public function search(Request $request){
        $query = Product::query();

        //$request->input()で検索時に入力した項目を取得
        $categorySearchId = $request->input('category_id');
        $statusSearchId = $request->input('status_id');
        $overviewSearchWord = $request->input('overview');

        //キーワードをスペースで区切って配列に入れなおす
        $overviewKeywords = preg_split('/[\p{Z}\p{Cc}]++/u', $overviewSearchWord, -1, PREG_SPLIT_NO_EMPTY);

        // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択したものと一致するカラムを取得
        if ($request->has('category_id') && $categorySearchId != ('指定なし')) {
            $query->where('category_id', $categorySearchId)->get();
        }

        // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択したものと一致するカラムを取得
        if ($request->has('status_id') && $statusSearchId != ('指定なし')) {
            $query->where('status_id', $statusSearchId)->get();
        }

        // キーワードの文字列を含むカラムを取得
        foreach($overviewKeywords as $key => $overviewKeyword){
            if ($overviewKeyword) {
                $query->where('overview', 'like', '%'.self::escapeLike($overviewKeyword).'%')->get();
            }
        }

        //ユーザを1ページにつき10件ずつ表示
        $products = $query->paginate(10);

        //カテゴリー、受付状態のデータ取得
        $categories = Category::orderBy('id')->get();
        $statuses = Status::orderBy('id')->get();

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
        //商品指定して取得
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

    //LIKE SQLクエリのエスケープ処理
    public static function escapeLike($str) {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    
}
