<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    function index(){
        $post = Post::all();
        return view('admin.post.index',compact('post'));
    }

    function create(){

        $category = Category::where('status', '0')->get();
        return view('admin.post.create',compact('category'));

    }

    function store(Request $request){
        $this->validate($request,[

            'post_name'=>'required|string|max:200',
            'category_id'=>'required',
            'slug'=>'required|string|max:200',
            'description'=>'required',
            'meta_title'=>'required|string|max:200',
            'yt_iframe'=>'required|string|max:200',
            'meta_description'=>'required|string',
            'meta_keyword'=>'required|string',
            'status'=>'nullable',
            
            
            ]);

            $post =new Post();
            $post->post_name = $request->post_name;
            $post->category_id = $request->category_id;
            $post->slug = Str::slug($request->slug);
            $post->description = $request->description;
            $post->yt_iframe = $request->yt_iframe;
            $post->meta_title = $request->meta_title;
            $post->meta_description = $request->meta_description;
            $post->meta_keyword = $request->meta_keyword;
            $post->status = $request->status == true ? '1':'0';
            $post->created_by = Auth::user()->id;
            $post->save();

            return redirect('admin/posts')->with('message',  'Post added successfully');
    }

     function edit($post_id){
        $category = Category::where('status','0')->get();
        $post = Post::findOrFail($post_id);
        return view('admin.post.edit',compact('post','category'));
     }

     function update(Request $request, $post_id){
        
        $this->validate($request,[

            'post_name'=>'required|string|max:200',
            'category_id'=>'required',
            'slug'=>'required|string|max:200',
            'description'=>'required',
            'meta_title'=>'required|string|max:200',
            'yt_iframe'=>'required|string|max:200',
            'meta_description'=>'required|string',
            'meta_keyword'=>'required|string',
            'status'=>'nullable',
            
            
            ]);

            $post = Post::findOrFail($post_id);
            $post->post_name = $request->post_name;
            $post->category_id = $request->category_id;
            $post->slug = Str::slug($request->slug);
            $post->description = $request->description;
            $post->yt_iframe = $request->yt_iframe;
            $post->meta_title = $request->meta_title;
            $post->meta_description = $request->meta_description;
            $post->meta_keyword = $request->meta_keyword;
            $post->status = $request->status == true ? '1':'0';
            $post->created_by = Auth::user()->id;
            $post->update();

            return redirect('admin/posts')->with('message',  'Post Updated successfully');
     }

     function destroy ($post_id){
        $post = Post::findOrFail($post_id);
        $post->delete();
        return redirect('admin/posts')->with('message',  'Post Deleted successfully');
  
     }
    
}


