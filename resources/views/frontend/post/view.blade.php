@extends('layouts.app')

@section('title',$post->meta_title)
@section('meta_description',$post->meta_description)
@section('meta_keyword',$post->meta_keyword)
@section('content')

<div class="py-4">
<div class="container">
<div class="row">
    <div class="col-md-9">
        <div class="category-heading">
        <h2>{!! $post->post_name !!}</h2>
        </div>
        <div class="mt-3">
            <h6>{{$post->category->name . ' / '. $post->post_name}}</h6>
        </div>

        <div class="card card-shadow mt-4">
            <div class="card-body">
                {!! $post->description !!}
            </div>
        </div>
    </div>
       
       
    <div class="col-md-3">
        <div class="border p-2 my-2">
          <h4>Advertising Area</h4>
        </div>

        <div class="border p-2 my-2">
          <h4>Advertising Area</h4>
        </div>

        <div class="border p-2 my-2">
          <h4>Advertising Area</h4>
        </div>

        <div class="card" mt-3>
            <div class="card-header">
                <h4>Latest post</h4>
            </div>
            <div class="card-body">
                @foreach($latset_posts as $latset_posts_item)
                <a href="{{url('tutorial/'.$latset_posts_item->category->name.'/'.$latset_posts_item->slug )}}" class="text-decoration-none">
                    <h6>{{$latset_posts_item->post_name}}</h6>
                </a>
                @endforeach
            </div>
        </div>

    </div>
  </div>
 </div>
</div>


@endsection