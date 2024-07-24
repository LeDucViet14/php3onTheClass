@extends('admin.layouts.default')

@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
            {{session('message')}}
            </div>
        @endif
        <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
        <a href="{{ route('admin.products.addProduct') }}" class="btn btn-info">Thêm mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listProducts as $key => $value)
                <tr>
                    <th scope="row">{{ $key +1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->price }}</td>
                    <td>{{ $value->img }}</td>
                    <td>
                        <button class="btn btn-warning">Sửa</button>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection