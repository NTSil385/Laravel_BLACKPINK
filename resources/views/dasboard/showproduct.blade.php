@extends('layouts.dasboard')

@section('content')
     <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                      <h3>Laravel CRUD with Image  <a href="{{route('product.create')}}" class="btn btn-primary float-end">New</a></h3>  
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Image</th>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>CATEGORY</th>
                                <th>PRICE</th>
                                <th>DISCOUNT</th>
                                <th>ACTION</th>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                     <tr>
                                        <td>
                                            <img src="{{asset('uploads/products/'.$product->thumbnail_url)}}" class="avt-img" alt="Avatar Image">
                                            <style>
                                                .avt-img {
                                                    width: 70px;
                                                    height: 70px;
                                                    border-radius: 50%;
                                                }
                                            </style>
                                        </td>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                            @foreach($categories as $category)
                                                 @if($category->id == $product->category_id)
                                        <td>
                                                    {{$category->category_name}}
                                        </td>
                                                 @endif
                                            @endforeach
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->discount}}</td>
                                        <td>
                                            <a href="{{route('product.edit', ['id'=>$product->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('product.delete', ['id' => $product->id])}}" class="btn btn-danger">Delete</a>
                                            
                                        </td>
                                     </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection