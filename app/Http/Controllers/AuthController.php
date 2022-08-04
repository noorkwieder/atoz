<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:store_user', ['only' => ['store']]);
        $this->middleware('permission:show_user', ['only' => ['show','index']]);
        $this->middleware('permission:update_user', ['only' => ['update']]);
        $this->middleware('permission:delet_user', ['only' => ['destroy']]);
    }

    protected function saveImage($image, $folder)
    {
    //save image in folder 
    $file_extension = $image -> getClientOriginalextension();
    $file_name = time().'.'.$file_extension;
    $path =$folder;
    $image -> move($path,$file_name);
    return $file_name;
    }

    public function register(Request $request)
    {
        $request->validate([
            'f_name'=> ['required', 'string', 'max:190'],
            'l_name'=> ['required', 'string', 'max:190'],
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            'password'=>['required'],
            'phone'=>['required'],
            
            
        ]);
        $file_name= $this -> saveImage($request-> img_url, 'img_url');


        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'phone' => $request->phone,
            'img_url'=>$file_name,
            
        ]);
        $role = Role::findByName($request->input('roles_name'));
        $data['user'] = $user;
        $data['type'] = 'Bearer';
        $data['token'] = $user->createToken('personal access token')->accessToken;
        $user->assignRole($role);
     
        return $this->sendResponse($data);
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> ['required', 'string', 'max:190'],
            'email'=>['required', 'email', Rule::unique('users', 'email')].$id,
            'password'=>['required'],
            'img_url'=>['required'],
            'phone'=>['required'],
        ]);


        $user = User::query()->update([
            'name' => $request->name,
            'email' => $request->email,
            'img_url' => $request->img_url,
            'password' => hash::make($request->password),
            'phone' => $request->phone,
        ]);

        $data['user'] = $user;
        $data['type'] = 'Bearer';
        $data['token'] = $user->createToken('personal access token')->accessToken;
        $user->assignRole($request->input('roles_name'));
     
        return $this->sendResponse($data);
    }







    public function show($id)
    {
    $user = User::find($id);
    return $this->sendResponse($user);
    }

    public function login(Request $request){

        $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required'],
            
        ]);

        $emailAndPassword = $request->only(['email', 'password']);


        if (!Auth::attempt($emailAndPassword)){
            throw new AuthenticationException();
        }

        $user = Auth::user();

        $data['user'] = $user;
        $data['type'] = 'Bearer';
        $data['token'] = $user->createToken('personal access token')->accessToken;

        return $this->sendResponse($data);
    }

    public function logout(Request $request){
        $user = Auth::user();

        $user->tokens()->delete();

        return $this->sendResponse(null);
    }
    public function destroy(Request $request)
{
User::find($request->user_id)->delete();

}
}
