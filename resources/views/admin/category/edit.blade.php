@extends('layouts.master')

@section('title','Category')
@section('content')


<div class="container-fluid px-4">
        
<div class="card mt-4">
<div class="card-header">
<h4 class="">Edit Category
<a href="{{url('admin/category')}}" class="btn btn-danger btn-sm float-end">Back</a>
</h4>
</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<div class="card-body">
    <form action="{{url('admin/update-category/'.$category->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mt-3">
        <label for="">Category Name</label>
        <input type="text" name="name" value="{{$category->name}}" class="form-control">
    </div>

    <div class="mt-3">
        <label for="">Slug</label>
        <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
    </div>

    <div class="mt-3">
        <label for="">Description</label>
        <textarea name="description" id="mysummernote" rows="5" class="form-control">{{$category->description}}</textarea>
    </div>

    <div class="mt-3">
        <label for="">Image</label>
        <input type="file" name="image" value="{{$category->image}}" class="form-control">
    </div>
    <br>

    <h6>SEO Tags</h6>
    <div class="mt-3">
        <label for="">Meta Title</label>
        <input type="text" name="meta_title" value="{{$category->meta_title }}" class="form-control">
    </div>

    <div class="mt-3">
        <label for="">Meta Description</label>
        <textarea name="meta_description"  rows="3" class="form-control">{{$category->meta_description }}</textarea>
    </div>

    <div class="mt-3">
        <label for="">Meta Keywords</label>
        <textarea name="meta_keyword"  rows="3" class="form-control">{{$category->meta_keyword }}</textarea>
    </div>
    <br>
    <h6 >Status Mode</h6>
    <div class="row">
        <div class="col-md-3 mb-3" >
            <label>Navbar Status</label>
            <input type="checkbox" name="navbar_status" {{$category->navbar_status == '1' ? 'checked':''}}>  
        </div>

        <div class="col-md-3 mb-3" >
            <label>Status</label>
            <input type="checkbox" name="status" {{$category->status == '1' ? 'checked':''}}>  
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Save Category</button>
        </div>
    </div>

    </form>
</div>
</div>  
</div>

@endsection