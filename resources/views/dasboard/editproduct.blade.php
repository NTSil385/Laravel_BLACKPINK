<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                      <h3>Form Edit Product <a href="http://127.0.0.1:8000/product-show" class="btn btn-danger float-end">Back</a></h3>  
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.update', ['id' => $products->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb3">
                                <label for="category_id">Category:</label>
                                <select value="{{$products->name}}" name="category_id" id="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb3">
                                <label for="">Name: </label>
                                <input type="text" value="{{$products->name}}" name="name" class="form-control">
                            </div>
                            <div class="form-group mb3">
                                <label for="">Price: </label>
                                <input type="text" value="{{$products->price}}" name="price" class="form-control">
                            </div>
                             <div class="form-group mb3">
                                <label for="">Discount: </label>
                                <input type="text" value="{{$products->discount}}" name="discount" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Image: </label>
                                <input type="file" name="thumbnail_url" id="" class="form-control">  
                            </div>
                            <div class="form-group mb3">
                                <label for="">Description: </label>
                                <input type="text" value="{{$products->description}}" name="description" class="form-control">
                            </div>
    
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>