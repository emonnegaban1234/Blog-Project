@extends('layouts.master')

@section('title','Category')
@section('content')


<div class="container-fluid px-4">
        <div class="card">
            <div class="card-header">

            <h4>View Category
                <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
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
                            <th>NAME</th>
                            <th>IMAGE</th>
                            <th>STATUS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        
                    </thead>

                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{asset($item->image)}}" width="50px" height="50px" alt="Image">
                            </td>
                            <td>{{$item->status == '1' ? 'Hidden':'Shown'}}</td>
                            <td>
                                <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        


        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
        </ol>
        <div class="row">

        </div>
    </div>

@endsection