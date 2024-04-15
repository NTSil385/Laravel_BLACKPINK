@extends('layouts.dasboard')

@section('content')
     <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                      <h3>Form Show infomation Bill  </h3>  
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>USER</th>
                                <th>ADDRESS</th>
                                <th>PHONE</th>
                                <th>NAME</th>
                                <th>TOTAL</th>                  
                                <th>ACTION</th>
                            </thead>
                            <tbody>
                                @foreach($bills as $bill)
                                     <tr>
                                        <td>{{$bill->id}}</td>
                                        @foreach($users as $user)
                                    
                                        @if($bill->user_id == $user->id)
                                            <td>{{$user->name}}</td>
                                        @endif
                                        @endforeach
                                        <td>{{$bill->address}}</td>
                                        <td>{{$bill->phone}}</td>
                                        <td>{{$bill->full_name}}</td>
                                        <td>{{$bill->bill}}</td>
                                    
                                  

                                        <td>
                                            <a href="{{route('bill.details', ['id'=>$bill->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('bill.delete', ['id' => $bill->id])}}" class="btn btn-danger">Delete</a>
                                            
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