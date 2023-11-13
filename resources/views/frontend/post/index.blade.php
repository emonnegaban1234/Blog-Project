@extends('layouts.app')

@section('content')

<div class="py-4">
<div class="container">
<div class="row">
    <div class="col-md-9">
        <div class="category-heading">
            <h4>{{$category->name}}</h4>
        </div>
            
        @forelse($post as $postitem)
        <div class="card card-shadow mt-4">
            <div class="card-body">
                <a href="{{url('tutorial/'.$category->slug.'/'.$postitem->slug)}}">
                <h2 class="post-heading">{{$postitem->post_name}}</h2>
                </a>
                <h6>Posted on: {{$postitem->created_at->format('Y-m-d H:i:s')}}</h6>
                <h6>
                    <span>Posted By: {{$postitem->User->name}}</span>
                </h6>
            </div>
        </div>
        @empty

        <div class="card card-shadow mt-4">
            <div class="card-body">
                <h1>No Post Avilable</h1>
            </div>
        </div>

    @endforelse

    </div>
    <div class="col-md-3">
        <div class="border p-2">
        <h4>Advertising Area</h4>
        </div>
    </div>
</div>
</div>
</div>


@endsection