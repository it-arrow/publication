<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Image;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::first();
        return view('admin.about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about = new About();
        $request->validate([
            'title' => 'required|max:255',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $about->title = $request->title;
        $about->about_content = $request->description;
        $about->message_content = $request->message_content;

        if ($request->hasFile('image')) {
            $imageName = date('YmdHis') . "." .$request->image->getClientOriginalName();  
        
            $request->image->move(public_path('uploads/about/'), $imageName);
            $about->about_image= $imageName;
        }
        if ($request->hasFile('message_image')) {
            $imageName = date('YmdHis') . "." .$request->message_image->getClientOriginalName();  
        
            $request->message_image->move(public_path('uploads/about/'), $imageName);
            $about->message_image= $imageName;
        }

        if($about->save()){
            return redirect()->route('about.index')->with('message','Saved successfully');
        }else{
            return redirect()->route('about.index')->with('error','Sorry! Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about = About::first();
        $request->validate([
            'title' => 'required|max:255',
            'description'=>'required',
            'image' => 'nullable|image',
            'chairman'=>'required|max:255',
            'registration'=>'nullable|max:255',
            'labour_department'=>'nullable|max:255',
            'member'=>'nullable|max:255',
            'capital'=>'nullable'
        ]);
        $about->title = $request->title;
        $about->about_content = $request->description;
        $about->message_content = $request->message_content;
        $about->chairman = $request->chairman;
        $about->registration = $request->registration;
        $about->labour_department = $request->labour_department;
        $about->member = $request->member;
        $about->capital = $request->capital;
        if ($image = $request->file('image')) {
            if($about->about_image!=null){
                $image_path = public_path('uploads/about/' . $about->about_image);
                
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $destinationPath = 'uploads/about/';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $about->about_image = "$profileImage";
            
        }else{
            unset($about->about_image);
        }

        if ($image = $request->file('message_image')) {
            if($about->message_image!=null){
                $image_path = public_path('uploads/about/' . $about->message_image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            
            $destinationPath = 'uploads/about/';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $about->message_image = "$profileImage";
            
        }else{
            unset($about->message_image);
        }

        if($about->update()){
            return redirect()->route('about.index')->with('message','Saved successfully');
        }else{
            return redirect()->route('about.index')->with('error','Sorry! Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function edit_organization_chart(){
        $chart=About::first();
        return view('admin.about.organization-chart',compact('chart'));
    }

    public function update_organization_chart(Request $request, $id){
        $chart=About::first();
        $request->validate([
            'organization_chart' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        if ($image = $request->file('organization_chart')) {
            if($chart->organization_chart!=null){
                $image_path = public_path('uploads/about/chart/' . $chart->organization_chart);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if (!is_dir(public_path('uploads/about/chart'))) {
                mkdir(public_path('uploads/about/chart'));
            }
            $destinationPath = 'uploads/about/chart';
            
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(1120, 1152, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            $chart->organization_chart = "$profileImage";
            
        }else{
            unset($chart->organization_chart);
        }
        $chart->update();
        return back()->with('message','Successfully updated');
    }

    public function message_chairman(){
        $message=About::first();
        return view('admin.about.message-chairman',compact('message'));
    }

    public function update_message_chairman(Request $request, $id){
        $message=About::first();
        $request->validate([
            'message_content'=>'required',
            'message_text'=>'nullable|max:300',
            'message_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $message->message_content=$request->message_content;
        $message->message_text=$request->message_text;
        if ($image = $request->file('message_image')) {
            if($message->message_image!=null){
                $image_path = public_path('uploads/about/message/' . $message->message_image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if (!is_dir(public_path('uploads/about/message'))) {
                mkdir(public_path('uploads/about/message'));
            }
            $destinationPath = 'uploads/about/message';
            
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(1120, 1152, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            $message->message_image = "$profileImage";
            
        }else{
            unset($message->message_image);
        }
        $message->update();
        return back()->with('message','Successfully updated');
    }

    public function mission_vision(){
        $mission_vision=About::first();
        return view('admin.about.mission-vision',compact('mission_vision'));
    }

    public function update_mission_vision(Request $request, $id){
        $mission_vision=About::first();
        
        $mission_vision->mission_description=$request->mission_description;
        $mission_vision->vision_description=$request->vision_description;
        
        $mission_vision->update();
        return back()->with('message','Successfully updated');
    }
}
