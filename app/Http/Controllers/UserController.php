<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function showUser() {
        $users = [
            [
                'id'=>'1',
                'name'=>'Việt',
            ],
            [
                'id'=>'2',
                'name'=>'Nam',
            ],
            
        ];
        // return view('list-user',compact('users'));
        return view('list-user')->with([
            'usersView' => $users
        ]);
    }

    //nếu ko có name thì giá trị mặc đinh là null
    function getUser($id, $name = null) {
        echo $id;
        echo $name;
    }

    function updateUser(Request $request){
        echo $request->id;
    }
}
