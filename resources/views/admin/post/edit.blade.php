@extends('layouts.master')

@section('title','Edit Post')
@section('content')

    <div class="container-fluid px-4">

        <div class="card">
        <div class="card-header">
        <h4>Edit Post
        <a href="{{url('admin/posts')}}" class="btn btn-danger btn-sm float-end">Back</a>
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
<form action="{{url('admin/update-post/'.$post->id)}}" method="POST">
    @csrf
    <div class="mt-3">
        <label for="">Category</label>
        <select name="category_id" required  class="form-control">
        <option value="">-- Select Category --</option>
            @foreach($category as $createitem)
            <option value="{{$createitem->id}}" {{ $post->category_id == $createitem->id ? 'selected':'' }}>
                {{$createitem->name}}
            </option>
            @endforeach
            
        </select>
    </div>

    <div class="mt-3">
        <label for="">Post Name</label>
        <input type="text" name="post_name" value="{{$post->post_name}}" class="form-control">
    </div>

    <div class="mt-3">
        <label for="">Slug</label>
        <input type="text" name="slug" value="{{$post->slug}}" class="form-control">
    </div>

    <div class="mt-3">
        <label for="">Description</label>
        <textarea name="description" class="form-control" id="mysummernote" rows="5">{!! $post->description !!}</textarea>
    </div>

    <div class="mt-3">
        <label for="">Youtube Iframe Link</label>
        <input type="text" name="yt_iframe" value="{{$post->yt_iframe}}" class="form-control">
    </div>
    <br>
    <h4>SEO Tag</h4>
    <div class="mt-1">
        <label for="">Meta Ttitle</label>
        <input type="text" name="meta_title" value="{{$post->meta_title}}" class="form-control">
    </div>
    
    <div class="mt-3">
        <label for="">Meta Description</label>
        <textarea name="meta_description" class="form-control" id="" rows="5">{!! $post->meta_description !!}</textarea>
    </div>

    <div class="mt-3">
        <label for="">Meta Keyword</label>
        <textarea name="meta_keyword" class="form-control" id="" rows="5">{!! $post->meta_keyword !!}</textarea>
    </div>
    <br>
    <h4>Status</h4>
            <div class="row">
            <div class="mt-1">
                <label for="">Status </label>
                <input type="checkbox" name="status" value="{{$post->meta_title == '1' ? 'checked':'' }}">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-sm float-end">Update Post</button>
            </div>
        </div>

        </form>
    </div>
 </div>

    </div>

@endsection