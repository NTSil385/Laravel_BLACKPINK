@extends('layouts.client')

@section('content')
    <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
            Shopping Page
        </h2>
        @if (session('status'))
            <h5 class="alert alert-success">{{session('status')}}</h5>
        @endif
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
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </section>
@endsection