@extends('layouts.app')
@section('title','Blog project')
@section('meta_description','Blog project')
@section('meta_keyword','Blog project')
@section('content')

<div class="bg-danger py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="owl-carousel owl-carousel owl-theme">
                @foreach($all_category as $all_cate_item)
                <div class="item">
                    <a href="{{url('tutorial/'.$all_cate_item->slug)}}" class="text-decoration-none">
                        <div class="card ">
                            <img src="{{$all_cate_item->image}}" alt="Image" class="item_image">
                            <div class="card-body text-center">
                                <h4 class="text-dark">{{$all_cate_item->name}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            
            </div>
        </div>
    </div>
</div>
<div class="py-1 bg-gray">
    <div class="container">
        <div class="border p-3 text-center">
        <h3>Advertise Here</h3>
        </div>
    </div>
</div>
<div class="PY-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h4>My Blog</h4>
                <div class="underline"></div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. In incidunt cum exercitationem laboriosam sequi voluptatibus ullam soluta enim sint mollitia nostrum, excepturi, eius quasi tenetur obcaecati laborum dicta sed quia facere magni non, minus odio. Repellendus dolorem, omnis illo voluptatem quo illum molestias est a, voluptatibus ullam magnam. Possimus, officiis!</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. In incidunt cum exercitationem laboriosam sequi voluptatibus ullam soluta enim sint mollitia nostrum, excepturi, eius quasi tenetur obcaecati laborum dicta sed quia facere magni non, minus odio. Repellendus dolorem, omnis illo voluptatem quo illum molestias est a, voluptatibus ullam magnam. Possimus, officiis!</p>
                
            </div>
        </div>
    </div>
</div>


<div class="PY-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h4>All Category List</h4>
                <div class="underline"></div>    
            </div>
            @foreach($all_category as $all_cate_item)
            <div class="col-md-3 ">
                <div class="card card-body mb-3">
                    <a href="{{url('tutorial/'.$all_cate_item->slug)}}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{$all_cate_item->name}}</h5>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="PY-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h4>Latest Post</h4>
                <div class="underline"></div>    
            </div>
            <div class="col-md-8">
            @foreach($latest_post as $latest_post_item)
            
                <div class="card card-body bg-gray shadow mb-3">
                    <a href="{{url('tutorial/'.$latest_post_item->category->slug).'/'.$latest_post_item->slug}}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{$latest_post_item->post_name}}</h5>
                    </a>
                </div>
            
            @endforeach
            </div>
            <div class="col-md-4">
                <div class="border p-3 text-center">
                <h3>Advertise Here</h3>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection

