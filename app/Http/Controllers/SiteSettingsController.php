<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use DB;

class SiteSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = SiteSetting::first();
        if(empty($setting)){
            $setting=new SiteSetting();
            $setting->title = 'Site Title';
            $setting->address = 'address';
            $setting->contact = ' (01) 525-4455';
            $setting->email = 'email';
            $setting->footer = 'footer';
            $setting->opening_hours = ' Monday - Friday : 8:00am - 5:00pm';
            $setting->fax_no = '(508) 525-4455';
            $setting->save();
        }
        // return view('admin.siteSettings.index', compact('setting'));
        return view('admin.settings.settings',compact('setting'));
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
        //
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
    public function update(Request $request,$id)
    {

        $setting = SiteSetting::find($id);
        $this->validateData($request);


        $logo = $setting->logo;
        $favicon = $setting->favicon;

        if ($request->hasFile('logo')) {
            if (!file_exists($this->destination)) {
                mkdir($this->destination, 0777, true);
            }
            if (file_exists($this->destination . $logo) && $logo != null) {
                unlink($this->destination . $logo);
            }
            $reqLogo = $request->file('logo');
            $logoName = time() . '.' . $reqLogo->getClientOriginalName();
            $reqLogo->move($this->destination, $logoName);
            $setting['logo'] = "$logoName";
        }
        if ($request->hasFile('favicon')) {
            if (file_exists($this->destination . $favicon) && $favicon != null) {
                unlink($this->destination . $favicon);
            }
            $reqFav = $request->file('favicon');
            $favName = time() . '.' . $reqFav->getClientOriginalName();
            $reqFav->move($this->destination, $favName);
            $setting['favicon'] = "$favName";
        }
        $setting->title = $request['title'];
        $setting->address = $request['address'];
        $setting->contact = $request['contact'];
        $setting->email = $request['email'];
        // $setting->footer = $request['footer'];
        // $setting->bank = $request['bank'];
        $setting->fax_no = $request['fax_no'];
        $setting->opening_hours = $request['opening_hours'];
        // $setting->esewa_num = $request['esewa_num'];



        $setting->update();

        return back()->with('message', 'Settings has been updated successfully');
    }

    private $destination = "admin/image/";



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

    // Validate Data
    protected function validateData(Request $request)
    {

        return $request->validate([
            'title' => 'required|max:100',
            'contact' => 'required',
            'address' => 'required|max:100',
            'email' => 'required|email',
            // 'footer' => 'required',
        ]);
    }
}
