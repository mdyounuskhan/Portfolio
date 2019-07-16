@extends('admin.dashboard.dashboard')

@section('Content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/add/product/list')}}">Product List</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$single_products->product_name}}</li>
        </ol>
    </nav>

    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" style="color:white">Edit Product</h3>
        </div>
    <hr>
        @if (session('updatestatus'))
        <div class="alert alert-success" style="text-align:center">
            {{session('updatestatus')}}
        </div>
        @endif
    <!-- form-group // -->
    <form action="{{url('/edit/product/insert')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label style="color:white">Category Name</label>
            <select class="form-control" name="category_id" >
                <option value="">--Select One--</option>
                @foreach ($categories as $category)
                    <option value=" {{ $category->id }} "> {{ $category->category_name }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label" style="color:white">Product Name</label>
            <div class="col-sm-9">
            <input type="text" value="{{ $single_products->product_name }}" class="form-control" name="product_name" id="name">
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="about" class="col-sm-3 control-label" style="color:white">Product description</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="product_description">{{ $single_products->product_description }}</textarea>
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label" style="color:white">Price</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{ $single_products->price }}" name="price" id="name">
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="qty" class="col-sm-3 control-label" style="color:white">Product Stock</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" value="{{ $single_products->product_stock }}" name="product_stock" id="qty">
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="qty" class="col-sm-3 control-label" style="color:white">Stock Alert</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" value="{{ $single_products->stock_alert }}" name="stock_alert" id="qty">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" style="color:white">Product Image</label>
            <div class="col-sm-3">
                <input type="file" class="form-control" name="product_image">
                <img src="{{asset('uploads/product_photos')}}/{{ $single_products->product_image }}" alt="Not Found" width="">
            </div>
        </div>
    <input type="hidden" value="{{ $single_products->id }}" name="product_id">
        <!-- Submit // -->
        <hr>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-danger">Update</button>
            </div>
        </div>
    </form>
</div>
</section>
</div>
@endsection
