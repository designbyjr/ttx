<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncomesResource;
use App\Models\Incomes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new Response(new IncomesResource(Incomes::all()),202);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'customer_id' => "required",
            'description' => "required",
            'income' => "required",
            'income_date'=> "required",
           'tax_year'=> "required",
            'income_file'=> "required"
        ]);
        $customer = new Incomes($request->input());
        $customer->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return new Response(new IncomesResource(Incomes::find($id)),202);
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
            'customer_id' => "required",
            'description' => "required",
            'income' => "required",
            'income_date'=> "required",
            'tax_year'=> "required",
            'income_file' => "required"
        ]);
        $income = Incomes::find($id);
        $income->update($request->input());
        return new Response('updated '.$id,202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $income = Incomes::find($id);
        $income->delete();
        return new Response('deleted '.$id,202);
    }
}
