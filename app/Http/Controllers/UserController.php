<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use App\Models\Token;
use App\Models\UserToken;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $schools = School::get();
        return view('admin.user.create', compact('roles','schools'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|same:confirmPassword',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'school'=> $request->school,
        ]);
        $user->assignRole($request->input('role'));
        //token
        // $token = new Token();
        // label:
        // $key = '';
        // $keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

        //     for ($i = 0; $i < 10; $i++) {
        //         $key .= $keys[array_rand($keys)];
        //     }
        //     $tokens = Token::where('token',$key)->first();
        //     if($tokens != null){
        //         goto label;
        //     }
        // $token->token = $key;
        // $token ->save();

        //user token
        // dd($token->id);
        // $user_token = new UserToken();
        // $user_token->teacher_id = $user->id;
        // $user_token->token_id = $token->id;
        // $user_token->save();


        // dd($user);
        return redirect()->route('users.index')->with('status', 'User Created Successfully');
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
        $schools = School::get();
        $user = User::where('id', $id)->with('roles')->first();
        // dd($user);
        $roles = Role::get();

        // dd($roles);

        // dd($user);
        return view('admin.user.edit', compact('user', 'roles','schools'));
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
        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        //     'password' => 'required|same:confirmPassword',
        //     'role' => 'required'
        // ]);
        // if (Auth::user()->id == $id) {
            // dd(Auth::user()->getRoleNames('Admin'));
        if (Auth::user()->getRoleNames('Admin')){
            // dd('dd');
            $user = User::findOrFail($id);
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->school = $request['school'];
            $user->password = Hash::make($request['password']);
            $user->assignRole($request->input('role'));
            $user->update();

            return redirect()->route('users.index')->with('message', 'User has been updated successfully');
        } else {
            return redirect()->route('users.index')->with('message', 'Only authenticated user can edit');
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User has been deleted successfully');
    }
}
