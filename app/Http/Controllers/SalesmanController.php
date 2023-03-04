<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesmanRequest;
use App\Http\Requests\UpdateSalesmanRequest;
use App\Models\Salesman;

class SalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Salesman";
        $primaryClass = "Salesman";
        $secondaryClass = "add-salesman";
        $salesmen = Salesman::all();
        $data = compact('title','primaryClass','secondaryClass','salesmen');
        // if(!(is_null($salesman))){
            return view('salesman')->with($data);
        // }
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
     * @param  \App\Http\Requests\StoreSalesmanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesmanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salesman  $salesman
     * @return \Illuminate\Http\Response
     */
    public function show(Salesman $salesman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salesman  $salesman
     * @return \Illuminate\Http\Response
     */
    public function edit(Salesman $salesman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesmanRequest  $request
     * @param  \App\Models\Salesman  $salesman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesmanRequest $request, Salesman $salesman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salesman  $salesman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salesman $salesman)
    {
        //
    }
}