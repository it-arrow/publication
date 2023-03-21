<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings=Training::get();
        return view('admin.training.index',compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.training.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:100|unique:trainings',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'training_date'=>'required',
            'agendas'=>'required',
            'description'=>'required',
            'duration'=>'required|string|max:20'
        ]);
        $training=new Training();
        $training->title=$request->title;
        $training->slug=Str::slug($request->title,'-');
        $training->training_date=$request->training_date;
        $training->description=$request->description;
        $training->agendas=$request->agendas;
        $training->duration=$request->duration;


        if ($request->hasFile('image')) {
            $imageName = date('YmdHis') . "." .$request->image->getClientOriginalName();  
     
            $request->image->move(public_path('uploads/trainings/'), $imageName);
            $training->image= $imageName;
        }
        $training->save();
        return redirect()->route('training.index')->with('message','Saved Successfully');
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
        $training=Training::find($id);
        return view('admin.training.edit',compact('training'));
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
        $request->validate([
            'title'=>'required|max:100|unique:trainings,title,'.$id,
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'training_date'=>'required',
            'agendas'=>'required',
            'description'=>'required',
            'duration'=>'required|string|max:20'
        ]);
        $training=Training::find($id);
        $training->title=$request->title;
        $training->slug=Str::slug($request->title,'-');
        $training->training_date=$request->training_date;
        $training->description=$request->description;
        $training->agendas=$request->agendas;
        $training->duration=$request->duration;

        if ($image = $request->file('image')) {
            if($training->image!=null){
                $image_path = public_path('uploads/train$training/' . $training->image);
                
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $destinationPath = 'uploads/trainings/';
            $profileimage = date('YmdHis') . "." .$image->getClientOriginalName();
            $image->move($destinationPath, $profileimage);
            $training->image = "$profileimage";
            
        }else{
            unset($training->image);
        }
        $training->update();
        return redirect()->route('training.index')->with('message','Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training=Training::find($id);
        $image_path = public_path('uploads/trainings/' . $training->image);    
        if(file_exists($image_path)){
            unlink($image_path);
        }else{
            
        }
        $training->delete();
        return back()->with('error','Deleted Successfully');
    }
}
