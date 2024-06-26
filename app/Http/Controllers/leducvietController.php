<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class leducvietController extends Controller
{
    //
    function informationStudent(){
        $infor = [
            'name'=>'Lê Đức Việt',
            'msv'=>'PH42025',
            'age'=>'20',
            'hometown'=>'Hà Nội',
            'hobbits'=>'soccer and run'
        ];
        return view('thong-tin-sinh-vien', compact('infor'));
    }
}
