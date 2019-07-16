@extends('layouts.header_footer')

@section('content')
    <!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="{{ url('/') }}">Home</a> /
				<a href="">Sales</a> /
				<a href="">Bags</a> /
				<span>Cart</span>
			</div>
			<img src="img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	<div class="page-area cart-page spad">
        <form action=" {{url('update/cart')}} " method="POST">
            @csrf
		<div class="container">
			<div class="cart-table">
				<table>
					<thead>
						<tr>
							<th class="product-th">Product</th>
							<th>Price</th>
							<th>Quantity</th>
							<th class="total-th">Total</th>
						</tr>
					</thead>
					<tbody>
                        @php
                            $sub_total = 0;
                        @endphp
                        @forelse ($cart_items as $cart_item)
						<tr>
							<td class="product-col">
								<img src="img/product/cart.jpg" alt="">
								<div class="pc-title">
                                <img src="{{asset('uploads/product_photos')}}/{{ App\Product::find($cart_item->product_id)->product_image }}" alt="" width="80">
									<h4> {{ App\Product::find($cart_item->product_id)->product_name }} </h4>
                                    <div>
                                    <a href="{{url('delete/from/cart')}}/{{$cart_item->id}}" > <div style="color:white" class="btn btn-sm btn-danger">Delete Product</div>
                                @if (App\Product::find($cart_item->product_id)->product_stock == 0)
                                    <div class="alert alert-danger">
                                        Out Of Stock Please Delete Cart
                                    </div>
                                @endif
                                </div>
							</td>
							<td class="price-col">৳{{ App\Product::find($cart_item->product_id)->price }}</td>
							<td class="quy-col">
								<div class="quy-input">
									<span>Qty</span>
									<input type="number" name="product_quantity[{{$cart_item->id}}]" value="{{ $cart_item->product_quantity }}">
								</div>
                            </td>
                            @php
                                $sub_total += ((App\Product::find($cart_item->product_id)->price)*$cart_item->product_quantity);
                            @endphp
							<td class="total-col">৳{{ (App\Product::find($cart_item->product_id)->price)*$cart_item->product_quantity }}</td>
						</tr>
                        @empty
                        <tr>
                            <td>
                                <td>
                                    <td>
                                        <div style="color:red">
                                            No Cart Available
                                        </div>
                                    </td>
                                </td>
                            </td>
                        </tr>
                        @endforelse
					</tbody>
				</table>
			</div>
			<div class="row cart-buttons">
				<div class="col-lg-5 col-md-5">
                <a href="{{url('/')}}"><div class="site-btn btn-continue">Continue shooping</div></a>
				</div>
				<div class="col-lg-7 col-md-7 text-lg-right text-left">
                <a href="{{url('clear/cart')}}"><div class="site-btn btn-clear">Clear cart</div></a>
                    <input class="site-btn btn-line btn-update" type="submit" name="submit" value="Update Cart">
				</div>
			</div>
        </div>
    </form>

		<div class="card-warp">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="shipping-info">
							<h4>Shipping method</h4>
							<p>Select the one you want</p>
							<div class="shipping-chooes">
								<div class="sc-item">
									<input type="radio" name="sc" id="one">
									<label for="one">Next day delivery<span>$4.99</span></label>
								</div>
								<div class="sc-item">
									<input type="radio" name="sc" id="two">
									<label for="two">Standard delivery<span>$1.99</span></label>
								</div>
								<div class="sc-item">
									<input type="radio" name="sc" id="three">
									<label for="three">Personal Pickup<span>Free</span></label>
								</div>
							</div>
							<h4>Cupon code</h4>
                            <p>Enter your cupone code</p>
                                @if (session('emptystatus'))
                                    <div class="alert alert-danger" style="text-align:center">
                                        {{session('emptystatus')}}
                                    </div>
                                @endif
                                    @if (session('status'))
                                        <div class="alert alert-danger" style="text-align:center">
                                            {{session('status')}}
                                        </div>
                                    @endif
							<div class="cupon-input">
								<input type="text" id="cupon_code" name="cupon_code">
                            <button class="site-btn" id="apply" >Apply</button>
							</div>
						</div>
					</div>
					<div class="offset-lg-2 col-lg-6">
                    <form action="{{url('checkout/proceed')}}" method="post">
                        @csrf
						<div class="cart-total-details">
							<h4>Cart total</h4>
							<p>Final Info</p>
							<ul class="cart-total-card">
                            <li>Subtotal<span>৳{{ $sub_total }}</span></li>
                                <li>Shipping<span>Free</span></li>
                            <li>Cupon Discount<span>৳{{$cupon_dis = ($discount = $sub_total/100*$discount_amount)}}</span></li>
                                <li class="total">Total<span>৳{{ $total = $sub_total-$discount }}</span></li>
                            <input type="hidden" name="total" value="{{$total}}">
                            <input type="hidden" name="cupon_dis" value="{{$cupon_dis}}">
                            </ul>
							<button class="site-btn btn-full" >Proceed to checkout</button>
                        </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page end -->
@endsection

@section('cupon_apply')
        <script>
            $(document).ready(function (){
                $('#apply').click(function (){
                    var cupon_code = $('#cupon_code').val();
                    window.location.href=('{{ url('/cart') }}'+'/'+cupon_code);
                })
            })
        </script>
@stop
