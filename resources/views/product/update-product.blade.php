<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="{{ route('product.updatePostProduct') }}" class="container" method="post">
        @csrf
        <h1 class="text-center">Thêm mới</h1>
        <div class="mb-3">
            <input type="hidden" name="idPro" value="{{$product->id}}">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">View</label>
            <input type="text" class="form-control" name="view" value="{{$product->view}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select id="" class="form-select" name="category_id">
                @foreach($listCategory as $value)
                    <option 
                        @if($value->id === $product->category_id)
                            selected
                        @endif
                        value="{{ $value->id }}">{{ $value->ten }}
                    </option>
                @endforeach
            </select>
        </div>    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>