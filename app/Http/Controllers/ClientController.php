<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $request->validate([
            'name'=>'required|max:50',
            'url'=>'required|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $client->name=$request->name;
        $client->slug=Str::slug($request->name,'-');
        $client->url=$request->url;
        if ($image = $request->file('image')) {
            $imageName = time().'.'.$image->extension();  
            $destinationPath = public_path('uploads/clients');
            $img = Image::make($image->path());
            
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $client->image= $imageName;
        }

        $client->save();
        return redirect()->route('client.index')->with('message','Client added successfully');
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
        $client=Client::find($id);
        return view('admin.clients.edit',compact('client'));
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
        $client = client::findOrFail($id);
        $request->validate([
            'name'=>'required|max:50',
            'url'=>'required|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $client->name=$request->name;
        $client->slug=Str::slug($request->name,'-');
        $client->url=$request->url;
        if ($image = $request->file('image')) {
            if($client->image!=null){
                $image_path = public_path('uploads/clients/' . $client->image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            
            $destinationPath = 'uploads/clients';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            $client->image = "$profileImage";
            
        }else{
            unset($client->image);
        }
        
        $client->update();
        return redirect()->route('client.index')->with('message','Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::findOrFail($id);
        $image_path = public_path('uploads/clients/' . $client->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $client->delete();
        return back()->with('message','Client deleted successfully');
    }
    public function client_section(){
        $section=HomePage::where('section','client_section')->first();
        if($section==null){
            $section=new HomePage();
            $section->section="client_section";
            $section->value=json_encode([
                'title'=>'',
                'text'=>'',
                'image'=>'',
            ]);
            $section->save();
        }
        return view('admin.clients.section',compact('section'));
    }
    public function client_section_update(Request $request){
        $request->validate([
            'title'=>'required|max:255',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $section=HomePage::where('section','client_section')->first();
        $section->section=$request->section;
        if ($image = $request->file('image')) {
            if(json_decode($section->value)->image!=null){
                $image_path = public_path('uploads/clients/bg/' . json_decode($section->value)->image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if (!is_dir(public_path('uploads/clients/bg'))) {
                mkdir(public_path('uploads/clients/bg'));
            }
            $destinationPath = 'uploads/clients/bg';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(1349, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            
        }else{
            if(json_decode($section->value)->image!=null){
                $image_path = public_path('uploads/clients/bg/' . json_decode($section->value)->image);
            
                if(file_exists($image_path)){
                    $profileImage=json_decode($section->value)->image;
                }
            }
            
            unset(json_decode($section->value)->image);
        }
        $section->value=json_encode([
            'title'=>$request->title,
            'text'=>$request->text,
            'image'=>$profileImage
        ]);
        $section->update();
        return back()->with('message','Successfully updated');
    }
}
