<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
// import DB
use Illuminate\Support\Facades\DB;

class ProductController  extends Controller
{
    public function listProduct(Request $req) {
        if(isset($req->search)){
            $listProduct = DB::table('product')
                ->join('category','category.id', '=', 'product.category_id')
                ->select('product.id', 'product.name', 'product.view', 'product.price', 'product.category_id', 'category.ten')
                ->orderby('view','desc')
                ->where('product.name', 'like', '%'.$req->search.'%')
                ->get();
            return view('product/list-product')->with([
                "listProduct" => $listProduct,
            ]);
        }else{
            $listProduct = DB::table('product')
            ->join('category','category.id', '=', 'product.category_id')
            ->select('product.id', 'product.name', 'product.view', 'product.price', 'product.category_id', 'category.ten')
            ->orderby('view','desc')
            ->get();
            return view('product/list-product')->with([
                "listProduct" => $listProduct,
            ]);
        }
        
    }

    public function addProduct(){
        $listCategory = DB::table('category')->get();
        return view('product/add-product')->with([
            "listCategory" => $listCategory,
        ]);
    }

    public function addPostProduct(Request $req){
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'view' => $req->view,
            'category_id' => $req->category_id,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->insert($data);
        return redirect()->route('product.listProduct');
    }

    public function deleteProduct($idProduct){
        DB::table('product')->where('id', $idProduct)->delete();
        return redirect()->route('product.listProduct');
    }

    public function updateProduct($idProduct){
        $listCategory = DB::table('category')->get();
        $product = DB::table('product')->where('id', '=', $idProduct)->first();
        return view('product/update-product')->with([
            "product" => $product,
            "listCategory" => $listCategory,
        ]);
    }

    public function updatePostProduct(Request $req){
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'view' => $req->view,
            'category_id' => $req->category_id,
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->where('id', $req->idPro)->update($data);
        return redirect()->route('product.listProduct');
    }


    public function test() {
        return view('admin/products/list-product');
    }
}
