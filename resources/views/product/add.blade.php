@extends('layout.master')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header row bg-white">
                <div class="col">
                    <h3>Thêm mới sản phẩm</h3>
                </div>
                <div class="col">
                    <a href="{{ route('products.index') }}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm">
                                @error('name')
                                    @if ($message)
                                        <div class="text-danger">{{ $message }}</div>
                                    @endif
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="price" class="form-label">Giá sản phẩm</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm">
                                @error('price')
                                    @if ($message)
                                        <div class="text-danger">{{ $message }}</div>
                                    @endif
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="image" class="form-label">Ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    @if ($message)
                                        <div class="text-danger">{{ $message }}</div>
                                    @endif
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Mô tả sản phẩm</label>
                                <input type="text" name="description" class="form-control" placeholder="Mô tả sản phẩm">
                                @error('description')
                                    @if ($message)
                                        <div class="text-danger">{{ $message }}</div>
                                    @endif
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
