@extends('admin.adminLayout')

@section('title', 'Admin Dashboard')

@section('content')

<h1 class="h1">Edit Category </h1>
<div class="container ">
    <form action="{{ url('admin/category/edit',$category->id) }} " method="POST">
        @csrf
        <div class="mb-3">
          <label  class="form-label h4">Name</label>
          <input type="text" name="name" value="{{ $category->name }}"  class="form-control rounded" required>
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
        <button type="submit" class="btn btn-outline-primary text-black">Update</button>
      </form>
</div>


@endsection