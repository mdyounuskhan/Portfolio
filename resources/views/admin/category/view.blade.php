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
            <h3 class="panel-title" style="color:white">Add Product Category</h3>
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
    <form action="{{url('/add/category/insert')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label" style="color:white">Category Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="category_name" placeholder="Category Name">
            </div>
        </div>
        <div class="form-group">
            <input type="checkbox" name="menu_status" id="menu" value="1"> <label style="color:white" for="menu"> Use As Menu</label>
        </div>
        <!-- Submit // -->
        <hr>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-Worning">Add Category</button>
            </div>
        </div>
    </form>
</div>
</section>
</div>
@endsection
