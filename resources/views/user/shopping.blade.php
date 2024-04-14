@extends('layouts.client')

@section('content')

<section class="shop_section layout_padding">
    <div class="container">
    <div class="dropdown">
                <button type="button" class="btn-cart dropdown-toggle " data-toggle="dropdown">
                    <i class="fa-solid fa-cart-shopping"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-content">
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach ((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-md-12 col-sm-12 total-section text-right">
                            <p> Total: <span class="text-info">${{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    <div class="row cart-detail" style="margin: 10px 0">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4 cart-detail-img">
                            <img src="{{asset('uploads/products/')}}/{{$details["image"]}}" class="image-cart" />
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{$details['name']}}</p>
                            <p class="price text-info">Price: ${{ $details['price'] }}</p>
                            <p class="count">Quantity: {{$details['quantity']}}</p>
                        </div>
                    </div>
                    <style>
                        .btn-cart{
                          width: 150px; 
                          height: 60px;                        
                          background-color: #fff;
                          border: 1px solid black;
                          border-radius: 12px;
                        }
                        .btn-checkout{
                            width: 100px;
                            height: 40px;
                            background-color: #fff;
                            color: black;
                            border: 1px solid black;
                        }
                        .dropdown {
                            position: relative;
                            display: inline-block;
                        }

                        .dropdown-content {
                            display: none;
                            position: absolute;
                            background-color: #f9f9f9;
                            min-width: 400px;
                            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                            padding: 12px 16px;
                            z-index: 1;
                        }

                        .dropdown:hover .dropdown-content {
                            display: block;
                        }

                        .image-cart {
                            max-width: 100px;
                            max-height: 100px;
                        }

                    </style>
                    @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{route('cart')}}" class="btn btn-checkout">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="heading_container heading_center">
            @if (session('status'))
            <h5 class="alert alert-success">{{session('status')}}</h5>
            @endif
            <h2>
                Shopping Page
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="{{route('home.details', ['id'=>$product->id])}}">
                        <div class="img-box">
                            <img src="{{asset('uploads/products/'.$product->thumbnail_url)}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{$product->name}}
                            </h6>
                            <h6>
                                Price
                                <span>
                                    {{$product->price}}
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <a href="{{route('add-to-cart', $product->id)}}" role="button"> Add</a>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
