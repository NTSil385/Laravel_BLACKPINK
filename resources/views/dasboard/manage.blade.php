@extends('layouts.dasboard')

@section('content')
     <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                      <h3>USERS FORM</h3>  
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                             
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>CREATE AT</th>
                                <th>UPDATE AT</th>
                                <th>ACTION</th>
                            </thead>
                            <tbody>
                                 @foreach($accounts as $account)
                                     <tr>
                                        <td>{{$account->id}}</td>
                                        <td>{{$account->name}}</td>
                                        <td>{{$account->email}}</td>
                                        <td>{{$account->created_at}}</td>
                                        <td>{{$account->updated_at}}</td>
                                        <td>
                                            <a href="{{route('users.edit', ['id'=>$account->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('users.delete', ['id' => $account->id])}}" class="btn btn-danger">Delete</a>
                                            
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