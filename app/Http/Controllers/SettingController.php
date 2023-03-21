<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function index(){
        $setting = SiteSetting::first();
        $social_medias=SocialMedia::get();
        if(empty($setting)){
            $setting = new SiteSetting();
            $setting->site_name="site name";
            $setting->primary_color="#FF5733";
            $setting->secondary_color="#FF5733";
            $setting->primary_address="Primary Address";
            $setting->whatsapp_no="9813562120";
            $setting->primary_email="primary@mail.com";
            $setting->secondary_email="secondary@mail.com";
            $setting->primary_phone="9813562120";
            $setting->secondary_phone="9843658978";
            $setting->save();
        }
        return view('admin.settings.settings',compact('setting','social_medias'));
    }

    // public function general_setting_store(Request $request){
    //     // dd($request->all());
    //     $setting=new SiteSetting();
    //     $request->validate([
    //         'site_name' => 'required|max:100',
    //         'primary_color' => 'required|max:7',
    //         'secondary_color' => 'required|max:7',
    //         'logo' => 'required|image',
    //         'favicon' => 'required|image',

    //     ]);
        
       
    //     if ($request->hasFile('logo')) {
    //         $logoName = time().'.'.$request->logo->extension();  
        
    //         $request->logo->move(public_path('uploads/generalSetting/'), $logoName);
    //         $setting->logo= $logoName;
    //     }
    //     if ($request->hasFile('favicon')) {
    //         $faviconName = time().'.'.$request->favicon->extension();  
        
    //         $request->favicon->move(public_path('uploads/generalSetting/'), $faviconName);
    //         $setting->favicon= $faviconName;
    //     }
    //     $setting->save();
    //     return back()->with('message', 'Saved Successfully');
    // }
    public function general_setting_update(Request $request,$id){
        
        $setting=SiteSetting::find($id);
        $request->validate([
            'site_name' => 'required|max:100',
            'primary_color' => 'required|max:7',
            'secondary_color' => 'required|max:7',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'popup'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'popup_url' => 'nullable|url',
            'brochure'=>'nullable|mimes:pdf,doc,docx',
            'office_hr'=>'nullable|max:100',
            'sticky_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        
        $setting->site_name=$request->site_name;
        $setting->primary_color=$request->primary_color;
        $setting->secondary_color=$request->secondary_color;
        if($request->enable_popup){
            $setting->popup_status=1;
        }else{
            $setting->popup_status=0;
        }
        if ($logo = $request->file('logo')) {
            if($setting->logo!=null){
                $logo_path = public_path('uploads/generalSetting/' . $setting->logo);
                
                if(file_exists($logo_path)){
                    unlink($logo_path);
                }
            }
            $profilelogo = time().'.'.$logo->extension();
            $destinationPath = 'uploads/generalSetting';
            $img = Image::make($logo->path());
            
            $img->resize(1200, 120, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profilelogo);
            
            $setting->logo = "$profilelogo";
            
        }else{
            unset($setting->logo);
        }
        if ($sticky_logo = $request->file('sticky_logo')) {
            if($setting->sticky_logo!=null){
                $sticky_logo_path = public_path('uploads/generalSetting/' . $setting->sticky_logo);
                
                if(file_exists($sticky_logo_path)){
                    unlink($sticky_logo_path);
                }
            }
            $sticky = time().'sticky.'.$sticky_logo->extension();
            $destinationPath = 'uploads/generalSetting';
            $img = Image::make($sticky_logo->path());
            
            $img->resize(1200, 120, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$sticky);
            
            $setting->sticky_logo = "$sticky";
            
        }else{
            unset($setting->sticky_logo);
        }
        if ($footer_logo = $request->file('footer_logo')) {
            if($setting->footer_logo!=null){
                $footer_logo_path = public_path('uploads/generalSetting/' . $setting->footer_logo);
                
                if(file_exists($footer_logo_path)){
                    unlink($footer_logo_path);
                }
            }
            $footer = time().'sticky.'.$footer_logo->extension();
            $destinationPath = 'uploads/generalSetting';
            $img = Image::make($footer_logo->path());
            
            $img->resize(1200, 120, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$footer);
            
            $setting->footer_logo = "$footer";
            
        }else{
            unset($setting->footer_logo);
        }
        
        if ($favicon = $request->file('favicon')) {
            if($setting->favicon!=null){
                $favicon_path = public_path('uploads/generalSetting/' . $setting->favicon);
                
                if(file_exists($favicon_path)){
                    unlink($favicon_path);
                }
            }
            $destinationPath = 'uploads/generalSetting/';
            $profilefavicon = time().'.'.$favicon->extension();
            $favicon->move($destinationPath, $profilefavicon);
            $setting->favicon = "$profilefavicon";
            
        }else{
            unset($setting->favicon);
        }
        if ($popup = $request->file('popup')) {
            if($setting->popup!=null){
                $popup_path = public_path('uploads/popup/' . $setting->popup);
                
                if(file_exists($popup_path)){
                    unlink($popup_path);
                }
            }
            $destinationPath = 'uploads/popup/';
            $profilepopup = time().'.'.$popup->extension();
            $popup->move($destinationPath, $profilepopup);
            $setting->popup = "$profilepopup";
            
        }else{
            unset($setting->popup);
        }
        $setting->popup_url=$request->popup_url;
        if ($brochure = $request->file('brochure')) {
            if($setting->brochure!=null){
                $brochure_path = public_path('uploads/brochure/' . $setting->brochure);
                
                if(file_exists($brochure_path)){
                    unlink($brochure_path);
                }
            }
            $destinationPath = 'uploads/brochure/';
            $profilebrochure = $brochure->getClientOriginalName();
            $brochure->move($destinationPath, $profilebrochure);
            $setting->brochure = "$profilebrochure";
            
        }else{
            unset($setting->brochure);
        }
        $setting->office_hr=$request->office_hr;
        $setting->iframe=$request->iframe;
        $setting->update();
        return back()->with('message', 'Saved Successfully');
    }
    public function contact_info_store(Request $request,$id){
        $setting=SiteSetting::find($id);
        $request->validate([
            'primary_address' => 'required',
            'primary_phone' => 'required|numeric|min:10',
            'whatsapp_no' => 'nullable|numeric|min:10',
            'secondary_phone'=>'nullable|min:10',
            'primary_email' => 'required|email',
            'secondary_email' => 'nullable|email',

        ]);
        $setting->primary_address=$request->primary_address;
        $setting->whatsapp_no=$request->whatsapp_no;
        $setting->primary_email=$request->primary_email;
        $setting->secondary_email=$request->secondary_email;
        $setting->primary_phone=$request->primary_phone;
        $setting->secondary_phone=$request->secondary_phone;
        $setting->update();
        return back()->with('message','Saved Successfully');
    }

    public function social_media_store(Request $request){
        $social=new SocialMedia();
        $request->validate([
            'icon'=>'required|max:50',
            'name'=>'required|max:50',
            'link'=>'required',
        ]);
        $social->icon=$request->icon;
        $social->name=$request->name;
        $social->link=$request->link;
        $social->save();
        return back()->with('message','Saved Successfully');
    }

    public function edit_social_store(Request $request){
        $data=SocialMedia::find($request->id);
        return view('admin.settings.editmodal',compact('data'));
        
    }

    public function social_media_update(Request $request){
        $social=SocialMedia::find($request->id);
        $request->validate([
            'icon'=>'required|max:50',
            'name'=>'required|max:50',
            'link'=>'required',
        ]);
        $social->icon=$request->icon;
        $social->name=$request->name;
        $social->link=$request->link;
        
        $social->update();
        return back()->with('message','Saved Successfully');
    }

    public function delete_social($id){
        $social= SocialMedia::find($id);
        $social->delete();
        return back()->with('error','Deleted Successfully');
    }

    public function breadcrumb_image(Request $request,$id){
        $setting=SiteSetting::find($id);
        
        if ($breadcrumb = $request->file('breadcrumb')) {
            if($setting->breadcrumb!=null){
                $breadcrumb_path = public_path('uploads/breadcrumb/' . $setting->breadcrumb);
                
                if(file_exists($breadcrumb_path)){
                    unlink($breadcrumb_path);
                }
            }
            $destinationPath = 'uploads/breadcrumb/';
            $profilebreadcrumb = time().'.'.$breadcrumb->extension();
            $img = Image::make($breadcrumb->path());
            
            $img->resize(1349, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profilebreadcrumb);
           
            $setting->breadcrumb = "$profilebreadcrumb";
            
        }else{
            unset($setting->breadcrumb);
        }
        $setting->update();
        return back()->with('message','Saved Successfully');
    }
}
