<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
// import DB
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function showUser() {
        // 1. lấy danh sách toàn bộ user
        $users = DB::table('users')->get();
        // dd($users); // giống vardump

        // 2. Lấy thông tin user có id = 4 
        $user4 = DB::table('users')->where('id', '=', '4')->first();
        // $user4 = DB::table('users')->find('4'); // chỉ tìm được = id
        // dd($user4);

        // 3. Lấy thuộc tính 'name' của user có id = 16
        $userName16 = DB::table('users')->where('id', '=', '16')->value('name');
        // dd($userName16);

        // 4. Lấy danh sách idUser của phòng ban 'Ban giám hiệu' 
        $idPhongBan = DB::table('phongban')->where('ten_donvi', '=', 'Ban giám hiệu')->value('id');
        $listIdUserPhongBan = DB::table('users')->where('phongban_id', '=', $idPhongBan)->pluck('id'); //pluck khác value -> pluck là cho vào Arr
        // dd($listIdUserPhongBan);

        // 5. Tìm user có độ tuổi lớn nhất trong công ty 
        $ageMax = DB::table('users')->max('tuoi');
        $userAgeMax = DB::table('users')->where('tuoi', $ageMax)->get();
        // dd($userAgeMax);

        // 6. Tìm user có độ tuổi nhỏ nhất trong công ty
        $ageMin = DB::table('users')->min('tuoi');
        $userAgeMin = DB::table('users')->where('tuoi', $ageMin)->get();
        // dd($userAgeMin);

        // 7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user 
        $idBGH = DB::table('phongban')->where('ten_donvi', '=', 'Ban giám hiệu')->value('id');
        $userBGH = DB::table('users')->where('phongban_id', $idBGH)->count('id');
        // dd($userBGH);

        // 8. Lấy danh sách tuổi các user (không lấy trùng tuổi)
        $listAgeUsers = DB::table('users')->distinct()->pluck('tuoi');
        // dd($listAgeUsers);

        // 9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        $userHT = DB::table('users')->where('name','like', '%khải')->orWhere('name','like', '%Thanh')->get();
        // dd($userHT);

        // 10. Lấy danh sách user(id, name, email) ở phòng ban 'Ban đào tạo'
        $idBDT = DB::table('phongban')->where('ten_donvi','Ban đào tạo')->value('id');
        $userBDT = DB::table('users')
            ->where('phongban_id', $idBDT)
            ->select('id','name','email')
            ->get();
        // dd($userBDT);

        // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        $user30 = DB::table('users')
            ->where('tuoi', '>=', '30')
            ->orderBy('tuoi','asc')
            ->get();
        // dd($user30);

        // 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        $user10 = DB::table('users')
            ->select('id','name','email')
            ->orderBy('tuoi','desc')
            ->offset(5)
            ->limit(10)->get();
        // dd($user10);

        // 13. Thêm một user mới vào công ty
        $data = [
            'name' => 'Lê Đức Việt',
            'email' => 'vietldph42025@gmail.com',
            'phongban_id' => '1',
            'songaynghi' => '0',
            'tuoi' => '20',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $addUser = DB::table('users')->insert($data);

        // 14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
        $idBDT = DB::table('phongban')->where('ten_donvi','Ban đào tạo')->value('id');
        $userBDT = DB::table('users')
            ->where('phongban_id', $idBDT)
            ->get();
        foreach($userBDT as $value){
            DB::table('users')->where('id', $value->id)->update([
                'name' => $value->name . 'PĐT'
            ]);
        }

        // 15. Xóa user nghỉ quá 15 ngày
        DB::table('users')->where('songaynghi','>', '15')->delete();





        // return view('list-user',compact('users'));
        // return view('list-user')->with([
        //     'usersView' => $users
        // ]);
    }

    //nếu ko có name thì giá trị mặc đinh là null
    function getUser($id, $name = null) {
        echo $id;
        echo $name;
    }

    function updateUser(Request $request){
        echo $request->id;
    }



    public function listUsers(){
        $listUsers = DB::table('users')
                    ->join('phongban','phongban.id', '=' , 'users.phongban_id')
                    ->select('users.id', 'users.email', 'users.name', 'users.phongban_id', 'users.songaynghi', 'phongban.ten_donvi')
                    ->get();
        return view('users/listUsers')->with(['listUsers' => $listUsers]);
    }

    public function addUsers() {
        $phongBan = DB::table('phongban')->select('id', 'ten_donvi')->get();
        return view('users/addUsers')->with(['phongBan'=>$phongBan]);
    }

    public function addPostUser(Request $req) {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'tuoi' => $req->age,
            'phongban_id' => $req->phongBanUser,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($data);
        return redirect()->route('users.listUsers');
    }

    public function deleteUser($idUser){
        DB::table('users')->where('id', $idUser)->delete();
        return redirect()->route('users.listUsers');
    }
}
