<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function edit_profile(){
        return view('admin.profile.profile');
    }

    public function update_profile(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);
                
        $user=Auth::user();
        
        $user->name=$request->name;
        $user->email=$request->email;
        // $user->phone=$request->phone;

        if ($request->hasFile('profile_image')) {
            if ($request->previous_profile_img != null) {
                $image_path = public_path('admin/image/' . $request->previous_profile_img);
                if(file_exists($image_path)){
                    unlink($image_path);
                    
                } 

                $image = time().'.'.$request->profile_image->extension();  
                $request->profile_image->move(public_path('admin/image/'), $image);
                
            } else{
                $image = time().'.'.$request->profile_image->extension();  
                $request->profile_image->move(public_path('admin/image/'), $image);
            } 
        }else {
            $image=$request->previous_profile_img;
        }
        $user->profile_image=$image;
        
        $user->update();

        return back()->with('message','Profile updated successfully');
    }

   
    public function updatePassword(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|same:confirm_password|min:6',
            'confirm_password'=>'required'
        ]);
        $user=Auth::user();
        $userPassword=$user->password;

        if(!Hash::check($request->current_password,$userPassword)){
            return back()->with('error','Current password doesnot match');
        }
        $user->password=Hash::make($request->input('password'));
        if($user->update()){
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return redirect()->route('login')->with('message','Password changed successfully');
        }
        
    }
}
