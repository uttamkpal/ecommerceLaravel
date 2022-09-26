@extends('admin.adminLayout')

@section('title', 'Products')

@section('content')

<div class="flex justify-between pb-3">
  <h1 class="h1">Products Page</h1>
  <a class="btn btn-success text-2xl flex items-center" href="{{ url('admin/product/create') }}">Add New</a>
</div>


  <table class="table table-striped ">
    <thead class="text-slate-800">
      <tr>
        <th class="text-slate-800">#ID</th>
        <th class="text-slate-800">title</th>
        <th class="text-slate-800">description</th>
        <th class="text-slate-800">image</th>
        <th class="text-slate-800">category</th>
        <th class="text-slate-800">quantity</th>
        <th class="text-slate-800">price</th>
        <th class="text-slate-800">mrp</th>
        <th class="text-slate-800">created_at</th>
        <th class="text-slate-800">updated_at</th>
        <th class="text-slate-800">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td><img width="120" src="{{ asset('user/img/product/'. $product->image) }}" alt=""></td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->mrp }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a class="btn btn-success" href="{{ url('admin/product/edit', $product->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('admin/product/delete', $product->id) }}"><i class="fas fas-trash fa-lg"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection