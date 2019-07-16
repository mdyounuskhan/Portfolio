@extends('admin.dashboard.dashboard')

@section('Content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{url('home')}} ">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product List</li>
        </ol>
    </nav>
    <table class="table table-bordered" style="color:white">
        @if (session('deletestatus'))
        <div class="alert alert-success" style="text-align:center">
            {{session('deletestatus')}}
        </div>
        @endif
        <thead>
            <tr>
                <th>SL. NO</th>
                <th>Product name</th>
                <th>Category name</th>
                <th>Product Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Stock Alert</th>
                <th>Product Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ str_limit($product->product_name, 15) }}</td>
                {{-- <td>None</td> --}}
                <td>{{ $product->relationtocategory->category_name }}</td>
                <td>{{ str_limit($product->product_description, 50) }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->product_stock }}</td>
                <td>{{ $product->stock_alert }}</td>
                <td>
                    <img src=" {{asset('uploads/product_photos')}}/{{ $product->product_image }} " alt="No Image" width="50">
                </td>
                <td>
                    <a href="{{url('/product/profile')}}/{{ $product->id }}" class="btn btn-sm btn-warning">
                        Profile
                    </a>
                    <a href="{{url('/edit/product')}}/{{ $product->id }}" class="btn btn-sm btn-info">
                        Edit
                    </a>
                    <a href="{{url('/delete/product')}}/{{ $product->id }}" class="btn btn-sm btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
            @empty
            <tr class="text-center text-danger">
                <td colspan="8">
                    Product Not Available !!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}
    <hr>

{{-- Deleted Product List --}}

    <div  class="alert alert-info">
        Deleted Product List
    </div>
    <table class="table table-bordered" style="color:white">
        @if (session('restore',))
        <div class="alert alert-success" style="text-align:center">
            {{session('restore', 'Permanentlydelete')}}
        </div>
        @endif

        @if (session('Permanentlydelete'))
        <div class="alert alert-success" style="text-align:center">
            {{session('Permanentlydelete')}}
        </div>
        @endif
        <thead>
            <tr>
                <th>SL. NO</th>
                <th>Product name</th>
                <th>Product Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Stock Alert</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($delete_products as $delete_product)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $delete_product->product_name }}</td>
                <td>{{ str_limit($delete_product->product_description) }}</td>
                <td>{{ $delete_product->price }}</td>
                <td>{{ $delete_product->product_stock }}</td>
                <td>{{ $delete_product->stock_alert }}</td>
                <td>
                    <a href="{{url('/restore/product')}}/{{ $delete_product->id }}" class="btn btn-success">
                        Restore
                    </a>
                    <a href="{{url('/Permanently/delete/product')}}/{{ $delete_product->id }}" class="btn btn-danger">
                        Permanently Delete
                    </a>
                </td>
            </tr>
            @empty
            <tr class="text-center text-danger">
                <td colspan="7">
                    Product Not Available !!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection



