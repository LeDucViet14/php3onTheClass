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
        
        <a href="{{ route('product.addProduct') }}" class="btn btn-success">Add</a>
        <h1>List Product</h1>
        <form action="{{ route('product.listProduct') }}" method="GET" class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Tim kiem</span>
            <input type="text" name="search" class="form-control" placeholder="Search product...">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">price</th>
                <th scope="col">view</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($listProduct as $key => $value)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->ten}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->view}}</td>
                <td>
                    <a href="{{ route('product.updateProduct', $value->id) }}" class="btn btn-warning">Update</a>
                    <a href="{{ route('product.deleteProduct', $value->id) }}" class="btn btn-danger">Delete</a>
                </td>
                
            </tr>
            @endforeach
            
        </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>