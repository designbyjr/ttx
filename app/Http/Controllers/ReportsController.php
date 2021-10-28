<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Incomes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Storage::files('reports');
        return Response($files,202);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::raw(
            'Select customers.*, sum(incomes.income) as income from customers
            left join incomes on incomes.customer_id = customers.id group by customers.id'
        );
        $fp = fopen(storage_path('app/public/reports').now()->toDateString(), 'w');
        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
    }


    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate(['date'=>'required']);
        $date = $request->date;
        $files = Storage::files('reports');
        $data = array_filter($files,function ($a) use($date){
           return  str_contains($a,$date);
        });

        return Response($data,202);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate(['date'=>'required']);
        $date = $request->date;
        $files = Storage::files('reports');
        $data = array_filter($files,function ($a) use($date){
            return  str_contains($a,$date);
        });
        Storage::delete($data);
        return Response($data,204);
    }
}
