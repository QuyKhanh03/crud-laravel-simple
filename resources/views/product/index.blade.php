@extends('layout.master')
@section('content')
    <div class="row ">
        <div class="card">
            <div class="card-header bg-white row">
                <div class="col">
                    <h3>Danh sách sản phẩm</h3>
                </div>
                <div class="col">
                    <a href="{{ route('products.create') }}" class="btn btn-primary float-end">Thêm mới</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $value)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->price }}</td>
                            <td>
                                <img src="{{ asset('images/' . $value->image) }}" alt="" width="100">
                            </td>
                            <td>
                                <form action="{{ route('products.destroy',$value->id) }}" method="POST">
                                <a href="{{ route('products.edit',$value->id) }}" class="btn btn-success">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
