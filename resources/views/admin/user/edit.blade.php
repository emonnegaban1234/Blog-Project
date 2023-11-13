@extends('layouts.master')

@section('title','Category')
@section('content')


<div class="container-fluid px-4">
        
            <div class="card mt-4">
                <div class="card-header">
                <h4 class="">Edit User
                    <a href="{{url('admin/users')}}" class="btn btn-danger btn-sm float-end">Back</a>
                </h4>
                </div>

                <div class="card-body">
                    <form action="{{url('admin/user-update/'.$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                    <div class="mt-3">
                        <label for="">Full Name</label>
                        <p class="form-control">{{$user->name}}</p>
                    </div>

                    <div class="mt-3">
                        <label for="">Email ID</label>
                        <p class="form-control">{{$user->email}}</p>
                    </div>

                    <div class="mt-3">
                        <label for="">Created At</label>
                        <p class="form-control">{{$user->created_at->format('d/m/y')}}</p>
                    </div>

                    <div class="mt-3">
                        <label for="">Role As</label>
                        <select name="role_as" id="" class="form-control">
                        <option value="1" {{$user->role_as == '1' ? 'selected':''}}>Admin</option>
                        <option value="0" {{$user->role_as == '0' ? 'selected':''}}>User</option>
                        <option value="2" {{$user->role_as == '2' ? 'selected':''}}>Blogger</option>
                        </select>
                    </div>
                    <br>
                        <div class="col-md-6 mt-3">
                            <button type="submit" class="btn btn-primary">Update User Role</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>  
    </div>

@endsection