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
            <h3 class="panel-title" style="color:white">Add Cupon</h3>
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
    <form action="{{url('/cupon/insert')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label" style="color:white">Cupon Code</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="cupon_code" id="name" value=" {{old('cupon_code')}}">
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="discount" class="col-sm-3 control-label" style="color:white">Cupon Discount</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="discount" id="discount" value="{{old('discount')}}">
            </div>
        </div>
        <!-- form-group // -->
        <div class="form-group">
            <label for="qty" class="col-sm-3 control-label" style="color:white">Valid Date</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="valid_date" id="qty" value="{{old('valid_date')}}" >
            </div>
        </div>
        <!-- Submit // -->
        <hr>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-Worning">Add Cupon</button>
            </div>
        </div>
    </form>
</div>
</section>
</div>
@endsection
