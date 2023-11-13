<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        $users = User::simplePaginate(2);
        return view('admin.user.index',compact('users'));
    }

   function edit ($user_id){
   
    $user = User::findOrFail($user_id);
    return view('admin.user.edit',compact('user'));
   }

   function update(Request $request ,$user_id){
        $user = User::findOrFail($user_id);
       if($user){
        $user->role_as = $request->role_as;
        $user->update();
        return redirect('/admin/users')->with('message','User role is updated successfully');
       }
       else{
        return redirect('/admin/users')->with('message','No user found');
       }
   }
   public function search()
   {
    $users = User::where('country', 'LIKE', '%'.$search.'%')
    ->get();
   }
}
