<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(),  [
            'name' => 'required',
            'gender' => 'required',
            'company_category'=>'required',
            'location'=>'required',
            'address'=>'required',
            'device'=>'required',


         ]);

         if ($validator->fails()) {

            return back()->withErrors($validator);;
        }


        unset($request['_token']);

        if ($request->hasFile('bg_image')) {
            $image = $request->file('bg_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/customer');
            $image->move($destinationPath, $image_name);
            $request['image'] = $image_name;
        }

        //return $request->except(['bg_image']);

        try {
            Customer::create($request->except(['bg_image']));
            return back()->with('success', "Successfully Created ");
        } catch (\Exception $exception) {
            //  return $exception->getMessage();
            return back()->with('failed', $exception->getMessage());
        }
     }
    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $data = Customer::join('users','users.id','=','customers.admin_id')->select('customers.*','users.image as admin')->get();
        return view('customer.index')->with('customers',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer,$id)
    {
        return view('customer.edit')
        ->with('customer',Customer::where('id',$id)->first())
        ->with('country',DB::table('country')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //return $request->except(['image']);
        unset($request['_token']);

        if ($request->hasFile('bg_image')) {
            $image = $request->file('bg_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/customer');
            $image->move($destinationPath, $image_name);
            $request['image'] = $image_name;
        }


       // return $request->except(['bg_image']);

        try {
            Customer::where('id', $request['id'])->update($request->except(['bg_image','id']));
            return back()->with('success', "Successfully Updated ");
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer,$id)
    {
        try {
            Customer::where('id', $id)->delete();
            return response()->json(['status'=>'Content Successfully Deleted!']);
        } catch (\Exception $exception) {
            return response()->json(['status'=>'Some problem!']);
        }
    }
}
