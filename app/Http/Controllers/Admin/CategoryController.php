<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;
use Image;
use Auth;
use File;



class CategoryController extends Controller
{
    function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    function create(){
        return view('admin.category.create');
    }
    function store(Request $request){
        $this->validate($request,[

        'name'=>'required|string|max:200',
        'slug'=>'required|string|max:200',
        'description'=>'required',
        'image'=>'required|mimes:jpg,jpeg,png',
        'meta_title'=>'required|string|max:200',
        'meta_description'=>'required|string',
        'meta_keyword'=>'required|string',
        'navbar_status'=>'nullable',
        'status'=>'nullable',
        
        
        ]);

        $categories = new Category();
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->slug);;
        $categories->description = $request->description;
        
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
        };
        
           $categories->image = $image_name;

           $categories->meta_title = $request->meta_title;
           $categories->meta_description = $request->meta_description;
           $categories->meta_keyword = $request->meta_keyword;
           $categories->navbar_status = $request->navbar_status == true ? '1': '0';
           $categories->status = $request->status == true ? '1': '0';
           $categories->created_by = Auth::user()->id;

           $categories->save();

           return redirect('admin/category')->with('message', 'Category successfully added');

    }

    function edit($category_id){
       $category = Category::findOrFail($category_id);
       return view('admin/category/edit',compact('category'));
    }

    function update(Request $request, $category_id){


        $this->validate($request,[
    
            'name'=>'required|string|max:200',
            'slug'=>'required|string|max:200',
            'description'=>'required',
            'image'=>'nullable|mimes:jpg,jpeg,png',
            'meta_title'=>'required|string|max:200',
            'meta_description'=>'required|string',
            'meta_keyword'=>'required|string',
            'navbar_status'=>'nullable',
            'status'=>'nullable',
            
            
            ]);
    
            $categories = Category::findOrFail($category_id);
            $categories->name = $request->name;
            $categories->slug = Str::slug($request->slug);;
            $categories->description = $request->description;
            
            
            if($request->image){

            $deleteimage = 'uploads/'.$categories->image;

            if(File::exists($deleteimage)){
                File::delete($deleteimage);
            }

                $extention = $request->image->getClientOriginalExtension();
                $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $image_name = 'uploads/'.$image_name;
                Image::make($request->image)
                    ->save(public_path().'/'.$image_name);
            };
            
               $categories->image = $image_name;
    
               $categories->meta_title = $request->meta_title;
               $categories->meta_description = $request->meta_description;
               $categories->meta_keyword = $request->meta_keyword;
               $categories->navbar_status = $request->navbar_status == true ? '1': '0';
               $categories->status = $request->status == true ? '1': '0';
               $categories->created_by = Auth::user()->id;
    
               $categories->update();
    
               return redirect('admin/category')->with('message', 'Category successfully added');
        
     }

     
    function destroy(Request $request){

    $categories = Category::findOrFail($request->category_delete_id);
    if($categories){

        $deleteimage = 'uploads/'.$categories->image;

        if(File::exists($deleteimage)){
            File::delete($deleteimage);
        }       
        $categories->posts()->delete();  
        $categories->delete();      
            return redirect('admin/category')->with('message', 'Category with its posts successfully deleted');
    
    }

    else{
    return redirect('admin/category')->with('message', 'No Category ID Found');
        }

}
        

    
}

 