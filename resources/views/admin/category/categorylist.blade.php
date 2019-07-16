@extends('admin.dashboard.dashboard')


@section('Content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{url('home')}} ">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category List</li>
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
                <th>Category name</th>
                <th>Menu Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ ($category->menu_status == 1) ? "YES":"NO" }}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
                <td>
                <button class="btn btn-success"><a href="{{url('change/menu/status')}}/{{$category->id}}"><div style="color:white">Change</div></a></button>
                <button class="btn btn-danger"><a href="{{url('delete/category')}}/{{$category->id}}"><div style="color:white">Delete</div></a></button>
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
    <br>
    <br>

    {{-- Delete Category.. --}}
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{url('home')}} ">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Delete Category List</li>
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
                <th>Category name</th>
                <th>Menu Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ ($category->menu_status == 1) ? "YES":"NO" }}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
                <td>
                <button class="btn btn-info"><a href="{{url('change/menu/status')}}/{{$category->id}}"><div style="color:white">Restore</div></a></button>
                <button class="btn btn-danger"><a href="{{url('delete/category')}}/{{$category->id}}"><div style="color:white">Permanently Delete</div></a></button>
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
    </table> --}}
@endsection
