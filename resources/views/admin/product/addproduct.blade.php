@extends('admin.dashboard.dashboard')

@section('Content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=" {{url('home')}} ">Dashboard</a></li>
            </ol>
        </nav>
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" style="color:white">Add Product</h3>
        </div>
    <hr>
        @if (session('status'))
        <div class="alert alert-success" style="text-align:center">
            {{session('status')}}
        </div>
        @endif
    <!-- form-group // -->
        @if ($errors->all())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </div>
        @endif
    <form action="{{url('/add/product/insert')}}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" name="product_name" id="name" value=" {{old('product_name')}}">
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="about" class="col-sm-3 control-label" style="color:white">Product description</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="product_description"> {{old('product_description')}} </textarea>
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label" style="color:white">Price</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="price" id="name" value="{{old('price')}}">
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="qty" class="col-sm-3 control-label" style="color:white">Product Stock</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="product_stock" id="qty" value="{{old('product_stock')}}" >
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="qty" class="col-sm-3 control-label" style="color:white">Stock Alert</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="stock_alert" id="qty" value="{{old('stock_alert')}}" >
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label class="col-sm-3 control-label" style="color:white">Product Image</label>
            <div class="col-sm-3">
                <input type="file" class="form-control" name="product_image">
            </div>
        </div>
        <!-- Submit // -->
        <hr>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-Worning" name="add_product">Add Product</button>
            </div>
        </div>
    </form>
</div>
</section>
</div>
@endsection
