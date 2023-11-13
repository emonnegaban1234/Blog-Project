@extends('layouts.master')

@section('title','Add Post')
@section('content')

<div class="container-fluid px-4">

 <div class="card">
    <div class="card-header">
    <h4>Add Post
        <a href="{{url('admin/posts')}}" class="btn btn-primary btn-sm float-end">View Post</a>
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
        <form action="{{url('admin/add-post')}}" method="POST">
            @csrf
            <div class="mt-3">
                <label for="">Category</label>
                <select name="category_id" class="form-control">
                    @foreach($category as $createitem)
                    <option value="{{$createitem->id}}">{{$createitem->name}}</option>
                    @endforeach
                    
                </select>
            </div>

            <div class="mt-3">
                <label for="">Name</label>
                <input type="text" name="post_name" class="form-control">
            </div>

            <div class="mt-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>

            <div class="mt-3">
                <label for="">Description</label>
                <textarea name="description" id="mysummernote" class="form-control" id="" rows="5"></textarea>
            </div>

            <div class="mt-3">
                <label for="">Youtube Iframe Link</label>
                <input type="text" name="yt_iframe" class="form-control">
            </div>
            <br>
            <h4>SEO Tag</h4>
            <div class="mt-1">
                <label for="">Meta Ttitle</label>
                <input type="text" name="meta_title" class="form-control">
            </div>
            
            <div class="mt-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description" class="form-control" id="" rows="5"></textarea>
            </div>

            <div class="mt-3">
                <label for="">Meta Keyword</label>
                <textarea name="meta_keyword" class="form-control" id="" rows="5"></textarea>
            </div>
            <br>
            <h4>Status</h4>
            <div class="row">
            <div class="mt-1">
                <label for="">Status </label>
                <input type="checkbox" name="status" >
            </div>

            <div class="mt-3">
                <label for="">Status </label>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

        </form>
    </div>
 </div>

    </div>

@endsection