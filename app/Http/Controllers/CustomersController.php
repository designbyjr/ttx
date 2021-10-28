<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomersResource;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new Response(new CustomersResource(Customers::all()),202);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => "required",
            'email' => "required",
            'phone' => "required",
            'utr'=> "required",
            'dob'=> "required",
            'profile_pic_url'=> "required"
        ]);
        $customer = new Customers($request->input());
        $customer->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return new Response(new CustomersResource(Customers::find($id)),202);
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
                'name' => "required",
                'email' => "required",
                'phone' => "required",
                'utr'=> "required",
                'dob'=> "required",
                'profile_pic_url'=> "required"
                ]);
            $customer = Customers::find($id);
            $customer->update($request->input());
            return new Response('updated '.$id,202);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Customers $id)
    {
        $id->delete();
        return new Response('deleted '.$id,202);
    }
}
