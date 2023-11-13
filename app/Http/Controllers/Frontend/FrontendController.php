<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class FrontendController extends Controller
{
    function index(){
        return view('frontend.index');
    }
    
    function viewcategory($category_slug){
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
       
        if($category){
            $post = Post::where('category_id',$category->id)->where('status','0')->get();
            return view('frontend.post.index',compact('post','category'));
        }
        else{
            return redirect('/');
        }
    }
    
    
}
