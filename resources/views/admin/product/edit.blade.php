@extends('admin.adminLayout')

@section('title', 'Admin Dashboard')

@section('content')

<h1 class="h1">New Product </h1>
<div class="container ">
    <form action="{{ url('admin/product/update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label  class="form-label h4">Title</label>
          <input type="text" name="title" value="{{ $product->title }}"  class="form-control rounded" required>
        </div>
        
        <div class="mb-3">
          <label  class="form-label h4">Description</label>
          <textarea rows="6" type="text" name="description"  class="form-control rounded" required> {{ $product->description }} </textarea>
        </div>
        <div class="mb-3">
          <label  class="form-label h4">Quantity</label>
          <input type="number" min="0" max="9999" name="quantity" value="{{ $product->quantity }}"  class="form-control rounded" required>
        </div>
        <div class="mb-3">
          <label  class="form-label h4">Price</label>
          <input type="number" min="0" max="9999999" name="price" value="{{ $product->price }}"  class="form-control rounded" required>
        </div>
        <div class="mb-3">
          <label  class="form-label h4">Discount Price</label>
          <input type="number" min="0" max="9999999" name="mrp" value="{{ $product->mrp }}" class="form-control rounded" >
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text h3" for="inputGroupSelect01">Categories</label>
            <select class="form-select form-control" name="category_id" id="inputGroupSelect01">
               @foreach ($category as $cat)
                @if($product->category->id == $cat->id)
                    <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                @else
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endif
               @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label h4">Select Image</label>
            <input class="h4" value="{{ $product->image }}" type="file" name="image" id="formFile">
            <img width="120"  src="{{ asset('user/img/product/'. $product->image) }}" alt="">
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    @endforeach
                </ul>
            </div>
        @endif
       
        <button type="submit" class="btn btn-outline-primary text-black">Add Product</button>
      </form>
</div>


@endsection