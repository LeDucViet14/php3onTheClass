<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add-user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <form action="{{ route('users.addPostUser') }}" class="container" method="post">
        @csrf
        <h1 class="text-center">Thêm mới</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tuổi</label>
            <input type="text" class="form-control" name="age">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phòng ban</label>
            <select id="" class="form-select" name="phongBanUser">
                @foreach($phongBan as $value)
                    <option value="{{ $value->id }}">{{ $value->ten_donvi }}</option>
                @endforeach
            </select>
        </div>    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>