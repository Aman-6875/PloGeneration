<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $active_user = User::where('is_admin',1)->get();
        $pending_user = User::where('is_admin',0)->get();
         $customer = Customer::all();



        //gender data
        $data = DB::table('customers')
        ->select(
        DB::raw('gender as gender'),
        DB::raw('count(*) as number'))
        ->groupBy('gender')
        ->get();
        $array[] = ['Gender', 'Number'];
        foreach($data as $key => $value)
        {
        $array[++$key] = [$value->gender, $value->number];
        }

         //location data
         $data = DB::table('customers')
         ->select(
         DB::raw('location as country'),
         DB::raw('count(*) as number'))
         ->groupBy('country')
         ->get();
         $location_array[] = ['Country', 'Number'];
         foreach($data as $key => $value)
         {
         $location_array[++$key] = [$value->country, $value->number];
         }

         //profession data
         $data_profession = DB::table('customers')
         ->select(
         DB::raw('profession as profession'),
         DB::raw('count(*) as number'))
         ->groupBy('profession')
         ->get();
         $profession_array[] = ['Profession', 'Number'];
         foreach($data_profession as $key => $value)
         {
         $profession_array[++$key] = [$value->profession, $value->number];
         }
         //device data
            $data_device = DB::table('customers')
            ->select(
            DB::raw('device as device'),
            DB::raw('count(*) as number'))
            ->groupBy('device')
            ->get();
            $device_array[] = ['device', 'Number'];
            foreach($data_device as $key => $value)
            {
            $device_array[++$key] = [$value->device, $value->number];
            }
         //price data
            $data_price = DB::table('customers')
            ->select(
            DB::raw('price as price'),
            DB::raw('count(*) as number'))
            ->groupBy('price')
            ->get();
            $price_array[] = ['price', 'Number'];
            foreach($data_price as $key => $value)
            {
            $price_array[++$key] = [$value->price, $value->number];
            }

        // return $device_array;


        return view('home')->with('active',count($active_user))
                           ->with('pending',count($pending_user))
                           ->with('customer',count($customer))
                           ->with('Allcustomer',$customer)
                           ->with('gender',json_encode($array))
                           ->with('country',json_encode($location_array))
                           ->with('profession',json_encode($profession_array))
                           ->with('device',json_encode($device_array))
                           ->with('price',json_encode($price_array));

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
