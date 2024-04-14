@extends('layouts.client')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
<div class="container">
    <div class="box">
        <div class="master-container">
            <div class="card cart">
                <label class="title">Your cart</label>
                @php $total = 0 @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <div class="products" data-id={{$id}}>
                    <div class="product" data-th="Product">
                       <div>
                        <img src = "{{asset('uploads/products/')}}/{{$details["image"]}}" width = "100px" height = "100px" alt=""/>
                       </div>
                        <div class="title">
                            <p class="title-name">{{$details['name']}}</p>
                        </div>
                        <input type="number" value="{{$details['quantity']}}" min="1" class="form-controller quantity cart_update"/>
                        <button class="btn-remove cart_remove">Delete</button>
                        <label class="price small">{{$details['price'] * $details['quantity']}}</label>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

            <div class="card checkout">
                <label class="title">Checkout</label>
                <div class="details">
                    <span>Your cart subtotal:</span>
                    <span></span>
                    <span>Discount through applied coupons:</span>
                    <span></span>
                    <span>Shipping fees:</span>
                    <span></span>
                </div>
                <div class="checkout--footer">
                    <div class="price"><sup>$</sup>{{$total}}</div>
                
                </div>
                  <div class="card coupons">
                <label class="title">Address</label>
                <form class="form" action="{{URL::to('checkout')}}">
                    <input required type="text" name="full_name" placeholder="Enter Your Full Name" class="input_field">
                    <input required type="text" name="address" placeholder="Enter Your Address" class="input_field">
                    <input required type="text" name="phone" placeholder="Enter Your Phone" class="input_field">
                    <input type="hidden" name="bill" value="{{$total}}" placeholder="Enter Your Phone" class="input_field">
                    <input type="submit" class="btn btn-primary" value="Checkout">
                </form>
            </div>

            </div>
        </div>
    </div>
    <style>
        .container {
            display: flex;
            align-items: center;
        }

        .title{
            text-align: center;
            margin: 10px 30px;
            
        }
    
        .cart_update{
            width: 80px;
            
        }

        .box {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 100px auto;
        }

        .master-container {
            display: grid;
            grid-template-columns: auto;
            gap: 5px;
        }

        .card {
            width: 700px;
            background: #FFFFFF;
            box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
        }

        .title {
            width: 100%;
            height: 40px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 20px;
            border-bottom: 1px solid #efeff3;
            font-weight: 700;
            font-size: 18px;
            color: #63656b;
        }

        /* cart */
        .cart {
            border-radius: 19px 19px 7px 7px;
        }

        .btn-remove{
            width: 45%;
            height: 45px;
            border-radius: 12px;
            border: 1px solid red;
            background-color: white;
            color: red;
        }

        .cart .products {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        .cart .products .product {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart .products .product span {
            font-size: 13px;
            font-weight: 600;
            color: #47484b;
            margin-bottom: 8px;
            display: block;
        }

        .cart .products .product p {
            font-size: 15px;
            font-weight: 600;
            color: #7a7c81;
        }

        .cart .quantity {
            height: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            margin: auto;
            background-color: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 7px;
            filter: drop-shadow(0px 1px 0px #efefef) drop-shadow(0px 1px 0.5px rgba(239, 239, 239, 0.5));
        }

        .cart .quantity label {
            width: 20px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 2px;
            font-size: 15px;
            font-weight: 700;
            color: #47484b;
        }

        .cart .quantity button {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 0;
            outline: none;
            background-color: transparent;
            padding-bottom: 2px;
        }

        .card .small {
            font-size: 15px;
            margin: 0 0 auto auto;
        }

        .card .small sup {
            font-size: 16px;
        }

        /* coupons */
        .coupons {
            border-radius: 7px;
        }

        .coupons form {
            display: grid;
            gap: 10px;
            padding: 10px;
        }

        .input_field {
            width: auto;
            height: 36px;
            padding: 0 0 0 12px;
            border-radius: 5px;
            outline: none;
            border: 1px solid #e5e5e5;
            filter: drop-shadow(0px 1px 0px #efefef) drop-shadow(0px 1px 0.5px rgba(239, 239, 239, 0.5));
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        }

        .input_field:focus {
            border: 1px solid transparent;
            box-shadow: 0px 0px 0px 2px #242424;
            background-color: transparent;
        }

        .coupons form button {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 10px 18px;
            gap: 10px;
            width: 100%;
            height: 36px;
            background: linear-gradient(180deg, #4480FF 0%, #115DFC 50%, #0550ED 100%);
            box-shadow: 0px 0.5px 0.5px #EFEFEF, 0px 1px 0.5px rgba(239, 239, 239, 0.5);
            border-radius: 5px;
            border: 0;
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 15px;
            color: #ffffff;
        }

        /* Checkout */
        .checkout {
            border-radius: 9px 9px 19px 19px;
        }

        .checkout .details {
            display: grid;
            grid-template-columns: 3fr 1fr;
            padding: 10px;
            gap: 5px;
        }

        .checkout .details span {
            font-size: 13px;
            font-weight: 600;
        }

        .checkout .details span:nth-child(odd) {
            font-size: 11px;
            font-weight: 700;
            color: #707175;
            margin: auto auto auto 0;
        }

        .checkout .details span:nth-child(even) {
            font-size: 13px;
            font-weight: 600;
            color: #47484b;
            margin: auto 0 auto auto;
        }

        .checkout .checkout--footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 10px 10px 20px;
            background-color: #efeff3;
        }

        .price {
            position: relative;
            font-size: 22px;
            color: #2B2B2F;
            font-weight: 900;
            float: right;
        }

        .price sup {
            font-size: 13px;
        }

        .price sub {
            width: fit-content;
            position: absolute;
            font-size: 11px;
            color: #5F5D6B;
            bottom: 5px;
            display: inline-block;
        }

        .checkout .checkout-btn {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 150px;
            height: 36px;
            background: linear-gradient(180deg, #4480FF 0%, #115DFC 50%, #0550ED 100%);
            box-shadow: 0px 0.5px 0.5px #EFEFEF, 0px 1px 0.5px rgba(239, 239, 239, 0.5);
            border-radius: 7px;
            border: 0;
            outline: none;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        }

    </style>
</div>
@endsection
@section('scripts')
 <script type="text/javascript">
     $(".cart_update").change(function(){
            var newQuantity = $(this).val();
            var productId = $(this).closest('.products').data('id');

            $.ajax({
                url: '{{route('update_cart')}}',
                method: 'PATCH',
                data: {
                    _token: '{{csrf_token()}}',
                    id: productId,
                    quantity: newQuantity
                },
                success: function(response){
                    window.location.reload();
                }
            });
        });
    
    $(document).ready(function(){
        $(".btn-remove").click(function(e){
            e.preventDefault();
            var els = $(this);
            if(confirm("Are you sure you want to remove")){
                $.ajax({
                    url: '{{route('remove-cart')}}',
                    method: 'DELETE',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: els.closest('.products').data('id')
                    },
                    success: function(respon){
                        window.location.reload();
                    }
                });
            }
        }); 
    });
</script>
@endsection
