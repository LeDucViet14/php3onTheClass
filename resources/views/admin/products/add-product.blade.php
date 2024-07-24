@extends('admin.layouts.default')

@push('styles')

@endpush

@section('content')
<form class="container mt-5 mb-5" action="{{ route('admin.products.AddPostProduct') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2>Add Product</h2>
  <div class="mb-3">
    <label for="name" class="form-label">Tên sp</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Giá</label>
    <input type="text" class="form-control" id="price" name="price">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Mô tả</label>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"></textarea>
        <label for="description">description</label>
    </div>
  </div>
  <div class="mb-3">
    <label for="img" class="form-label">Ảnh</label>
    <input type="file" class="form-control" id="img" name="img" accept="image/*">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

@push('scripts')

@endpush