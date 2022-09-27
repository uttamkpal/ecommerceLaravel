@extends('admin.adminLayout')

@section('title', 'Orders')

@section('content')

<div class="flex justify-between pb-3">
  <h1 class="h1">Orders Page</h1>
  <a class="btn btn-success text-2xl flex items-center" href="{{ url('admin/product/create') }}">Add New</a>
</div>


  <table class="table table-striped ">
    <thead class="text-slate-800">
      <tr>
        <th class="text-slate-800">#Invoice</th>
        <th class="text-slate-800">User Name</th>
        <th class="text-slate-800">Phone</th>
        <th class="text-slate-800">image</th>
        <th class="text-slate-800">category</th>
        <th class="text-slate-800">price</th>
        <th class="text-slate-800">Count</th>
        <th class="text-slate-800">Status</th>
        <th class="text-slate-800">Note</th>
        <th class="text-slate-800">created_at</th>
        <th class="text-slate-800">updated_at</th>
        <th class="text-slate-800">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <th scope="row">{{ $order->invoice }}</th>
                <th >{{ $order->user->name }}</th>
                <td>{{ $order->phone }}</td>
                <td><img width="120" src="{{ asset('user/img/product/'. $order->products->image) }}" alt=""></td>
                <td>{{ $order->products->category->name }}</td>
                {{-- <td>{{ $order->products->quantity }}</td> --}}
                <td>{{ $order->products->price }}</td>
                <td>{{ $order->count }}</td>
                <td scope="row">{{ $order->status }}</td>
                <td>{{ $order->note }}</td>
                {{-- <td>{{ $order->products->mrp }}</td> --}}
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->updated_at }}</td>
                <td>
                    <a class="btn btn-success" href="{{ url('admin/product/edit', $order->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('admin/product/delete', $order->id) }}"><i class="fas fas-trash fa-lg"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection