<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Status;
use App\Category;

class SearchController extends Controller
{
    public function index(Request $request){
        $query = Product::query();

        //$request->input()で検索時に入力した項目を取得します。
        $search1 = $request->input('category_id');
        $search2 = $request->input('status_id');
        $search3 = $request->input('overview');

        $keywords = preg_split('/[\p{Z}\p{Cc}]++/u', $search3, -1, PREG_SPLIT_NO_EMPTY);

        // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した棋力と一致するカラムを取得します
        if ($request->has('category_id') && $search1 != ('指定なし')) {
            $query->where('category_id', $search1)->get();
        }

        // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した好きな戦法と一致するカラムを取得します
        if ($request->has('status_id') && $search2 != ('指定なし')) {
            $query->where('status_id', $search2)->get();
        }

        // ユーザ名入力フォームで入力した文字列を含むカラムを取得します
        foreach($keywords as $key => $keyword){
            if ($keyword) {
                $query->where('overview', 'like', '%'.$keyword.'%')->get();
            }
        }

        //ユーザを1ページにつき10件ずつ表示させます
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
}