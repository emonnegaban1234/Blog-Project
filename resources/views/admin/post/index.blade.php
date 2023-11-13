@extends('layouts.master')

@section('title','Post')
@section('content')

<div class="container-fluid px-4">

 <div class="card">
    <div class="card-header">
    <h4>View Post
        <a href="{{url('admin/add-post')}}" class="btn btn-primary btn-sm float-end">Add Post</a>
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
                            <th>CATEGORY</th>
                            <th>POST NAME</th>
                            <th>STATUS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        
                    </thead>

                    <tbody>
                        @foreach ($post as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->post_name}}</td>
                            
                            <td>{{$item->status == '1' ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/edit/'.$item->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{url('admin/destroy-post/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
 </div>

    </div>

@endsection