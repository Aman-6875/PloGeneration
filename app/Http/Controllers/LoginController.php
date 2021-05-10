<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function index(){
        return view('login');
    }
    public function registerIndex(){
        return view('register');
    }

    public function login(Request $request){
        $user = User::where('user_id',$request->email)->first();
        if($user){
            if($user->is_admin==1){
                if (Auth::attempt(['user_id' => $request->email, 'password' => $request->password])) {
                    return redirect()->intended('/');
                 }
                 else{
                    return back()->with('failed','Login Error, Use Valid Credentials!');
                 }
            }else{
                return back()->with('failed','You need an approval for Login!');
            }
        }else{
            return back()->with('failed','Register First For Login!!');
        }
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required|min:6',
            'first_name'=>'required',
            'last_name'=>'required',
         ]);
         if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

            $data = [
                'name'=>$request->name,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'user_id'=>$request->email,
                'password'=>Hash::make($request->password),
                'user_type'=>0,
                'user_role'=>$request->user_role,
                'is_admin'=>1,
             ];
             $user = User::where('user_id',$request->email)->first();

          if($user){
            return back()->with('failed', "Email is already taken. ");
          }else{
            //   return $data;
            try {
                $user = new User;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->user_id = $request->email;
                $user->password = Hash::make($request->password);
                $user->user_type = 0;
                $user->user_role = $request->user_role;
                $user->is_admin = 1;
               // dd($user);
                $user->save();
                Auth::login($user);
                return redirect('/login');
//                return back()->with('success', "Your Account has created Successfully. Please Login");
            } catch (\Exception $exception) {
                return back()->with('failed', $exception->getMessage());
            }
          }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }



}
