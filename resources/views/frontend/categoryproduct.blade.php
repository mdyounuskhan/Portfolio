@extends('layouts.header_footer')

@section('content')
    <!-- Page Info -->
	<div class="page-info-section page-info-big">
		<div class="container">
			<h2>Dresses</h2>
			<div class="site-breadcrumb">
            <a href="{{url('/')}}">Home</a> /
				<span> {{ $single_categorys->category_name }} </span>
			</div>
        <img src="{{asset('frontend')}}/img/categorie-page-top.png" alt="" class="cata-top-pic">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	<div class="page-area categorie-page spad">
		<div class="container">
			<div class="categorie-filter-warp">
				<p>Showing 12 results</p>
				<div class="cf-right">
					<div class="cf-layouts">
						<a href="#"><img src="img/icons/layout-1.png" alt=""></a>
						<a class="active" href="#"><img src="{{asset('frontend')}}/img/icons/layout-2.png" alt=""></a>
					</div>
					<form action="#">
						<select>
							<option>Color</option>
						</select>
						<select>
							<option>Brand</option>
						</select>
						<select>
							<option>Sort by</option>
						</select>
					</form>
				</div>
			</div>
			<div class="row">
                @forelse ($categoryproducts as $categoryproduct)
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src=" {{ asset('uploads/product_photos') }}/{{ $categoryproduct->product_image }} " alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="{{asset('frontend')}}/img/icons/eye.png" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="{{asset('frontend')}}/img/icons/heart.png" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6> {{ str_limit($categoryproduct->product_name, 19) }} </h6>
							<p>৳{{ $categoryproduct->price }}</p>
							<a href="{{ url('add/to/cart') }}/{{ $categoryproduct->id }}" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
                </div>
                @empty
                No Category Product Available
                @endforelse
			</div>
		</div>
	</div>
	<!-- Page -->
@endsection
