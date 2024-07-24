<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function ListProducts(){
        $listProducts = Product::all();
        return view('admin.products.list-product')->with(['listProducts' => $listProducts]);
    }

    public function AddProducts(){
        return view('admin.products.add-product');
    }

    public function AddPostProduct(Request $req){
        $imgUrl = '';
        if($req->hasFile('img')){
            $img = $req->file('img');
            $nameImg = time() . "." . $img->getClientOriginalExtension();
            $link = "imageProduct/" . $nameImg;
            $img->move(public_path($link), $nameImg);

            $imgUrl = $link . $nameImg;
        }


        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'description' => $req->description,
            'img' => $imgUrl
        ];
        Product::create($data);
        return redirect()->route('admin.products.ListProducts')->with(['message' => 'Add Product successfully']);
    }
}
