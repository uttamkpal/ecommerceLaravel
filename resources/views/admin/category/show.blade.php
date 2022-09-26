@extends('admin.adminLayout')

@section('title', 'Admin Dashboard')

@section('content')

<div class="flex justify-between pb-3">
  <h1 class="h1">Categories</h1>
  <a class="btn btn-success text-2xl flex items-center" href="{{ url('admin/category/create') }}">Add New</a>
</div>


  <table class="table table-striped ">
    <thead class="text-slate-800">
      <tr>
        <th class="text-slate-800">#ID</th>
        <th class="text-slate-800">Name</th>
        <th class="text-slate-800">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($category as $cat)
            <tr>
                <th scope="row">{{ $cat->id }}</th>
                <td>{{ $cat->name }}</td>
                <td>
                    <a class="btn btn-success" href="{{ url('admin/category/edit', $cat->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('admin/category/delete', $cat->id) }}"><i class="fas fas-trash fa-lg"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection