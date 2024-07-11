<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List-users</title>
</head>
<body>
    <h1>Danh sách users</h1>
    <a href="{{ route('users.addUsers') }}">Thêm mới</a>
    <table border=1>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Số ngày nghỉ</th>
                <th>Phòng ban</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listUsers as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->songaynghi}}</td>
                    <td>{{$user->ten_donvi}}</td>
                    <td>
                        <a href=""><button>Update</button></a>
                        <a href="{{ route('users.deleteUser', $user->id) }}"><button>Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>