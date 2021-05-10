<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $active_user = User::where('is_admin',1)->get();
        $pending_user = User::where('is_admin',0)->get();


// return $user = Auth::user()-user_role;

        //gender data



         //location data




        return view('home');

    }

    public function allUser(){
        $user = User::all();
        return view('user.index')->with('data',$user);
    }
    public function removeAdmin($id){
        $data = [
            'is_admin'=>0
        ];
        $user = User::where('id',$id)->update($data);
        return redirect()->to('/users');
    }

    public function addAdmin($id){
        $data = [
            'is_admin'=>1
        ];
        $user = User::where('id',$id)->update($data);
        return redirect()->to('/users');
    }
    public function createUser(){
        return view('user.create');
    }
    public function editUser($id){
        return view('user.edit')->with('user',User::where('id',$id)->first());
    }

    public function addUser(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|min:6',
            'name'=>'required'
         ]);
         if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'user_type'=>0,
                'is_admin'=>1,
             ];
             $user = User::where('email',$request->email)->first();

          if($user){
            return back()->with('failed', "Email is already taken. ");
          }else{
            try {
                User::create($data);
                return back()->with('success', "Successfully Created ");
            } catch (\Exception $exception) {
                return back()->with('failed', $exception->getMessage());
            }
          }
        }
    }
    public function updateUser(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'name'=>'required'
         ]);
         if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

             //$password = Hash::make($request->password);
             $user = User::where('id',$request->id)->first();
            if($request->password==''){
                $data = [
                    'name'=>$request->name,
                    'email'=>$request->email,
                 ];
            }else{
                $data = [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                 ];
            }

            try {
                User::where('id',$request->id)->update($data);
                if($files=$request->file('bg_image')){
                    request()->validate([
                        'bg_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                    ]);

                $image = time().'.'.request()->bg_image->getClientOriginalExtension();
               // request()->bg_image->move(public_path('../all-assets/image'), $image);
                request()->bg_image->move(public_path('/images/user/'), $image);

                       User::where('id',$request->id)
                       ->update([
                        'image' => $image
                        ]);
                }
                return back()->with('success', "Successfully Updated ");
            } catch (\Exception $exception) {
                return back()->with('failed', $exception->getMessage());
            }
        }
    }

    public function deleteUser($id){
        $user = User::where('id',$id)->delete();
        return response()->json(['status'=>'Content Successfully Deleted!']);
    }
}
