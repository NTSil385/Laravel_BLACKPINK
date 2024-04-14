@extends('layouts.dasboard')

@section('content')
     <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                      <h3>Form Add Category <a href="{{route('admin.home')}}" class="btn btn-danger float-end">Back</a></h3>  
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="form-group mb3">
                                <label for="">Name: </label>
                                <input type="text" name="category_name" id="category_name" class="form-control">
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