@extends('layouts.dasboard')

@section('content')
     <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                      <h3>Form Add Product <a href="{{route('admin.home')}}" class="btn btn-danger float-end">Back</a></h3>  
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb3">
                                <label for="category_id">Category:</label>
                                <select name="category_id" id="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb3">
                                <label for="">Name: </label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mb3">
                                <label for="">Price: </label>
                                <input type="text" name="price" class="form-control">
                            </div>
                             <div class="form-group mb3">
                                <label for="">Discount: </label>
                                <input type="text" name="discount" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Image: </label>
                                <input type="file" name="thumbnail_url" id="" class="form-control">
                            </div>
                            <div class="form-group mb3">
                                <label for="">Description: </label>
                                <input type="text" name="description" class="form-control">
                            </div>
    
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection