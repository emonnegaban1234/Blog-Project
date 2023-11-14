<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class FrontendController extends Controller
{
    function index(){
        $all_category = Category::where('status','0')->get();
        return view('frontend.index',compact('all_category'));
    }
    
    function viewcategory(string $category_slug){
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
       
        if($category){
            $post = Post::where('category_id',$category->id)->where('status','0')->paginate(1);
            return view('frontend.post.index',compact('post','category'));
        }
        else{
            return redirect('/');
        }
    }

    function viewPost(string $category_slug, string $post_slug){

        $category = Category::where('slug',$category_slug)->where('status','0')->first();
       
        if($category){
            $post = Post::where('category_id',$category->id)->where('slug', $post_slug)->where('status','0')->first();
            $latset_posts = Post::where('category_id',$category->id)->orderBy('created_at', 'DESC')->where('status','0')->get()->take(2);
            return view('frontend.post.view',compact('post','latset_posts'));
        }
        else{
            return redirect('/');
        }

    }
    
    
}
