@extends('layouts.master')

@section('title','View User')
@section('content')

<div class="container-fluid px-4">

 <div class="card">
    <div class="card-header">
    <h4>View User
    
  <div class="input-group float-end">
  <div class="form-outline">
    <input type="search" id="form1" class="form-control " />
    
  </div>
  <button type="button" class="btn btn-primary ">
    <i class="fas fa-search"></i>
  </button>
</div>
    
    </h4>
    </div>

    <div class="card-body">
    @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif


    <table class="table table-border">
        <thead>
            <tr>
                <th>ID</th>
                <th>USER NAME</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>EDIT</th>
                
            </tr>
            
        </thead>

        <tbody>
            @foreach ($users as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                
                <td>{{$item->role_as == '1' ? 'Admin':'User'}}</td>
                <td>
                    <a href="{{url('admin/users/'.$item->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
    <div>
    </div>
    </div>
 </div>

    </div>

@endsection