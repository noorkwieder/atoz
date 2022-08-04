<?php

namespace App\Http\Controllers;

use App\Models\country;
use Illuminate\Http\Request;

class Countrycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function __construct()
    {
        $this->middleware('permission:store_resturant', ['only' => ['store']]);
        $this->middleware('permission:show_resturant', ['only' => ['show','index']]);
        $this->middleware('permission:update_resturant', ['only' => ['update']]);
        $this->middleware('permission:delet_resturant', ['only' => ['destroy']]);
    }*/
    public function index()
    {
        //
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
            'name' => 'required',
           
            
         ]);
 
         $country = country::query()->create([
            'name' => $request->name,
            
         ]);
 
         return $this->sendResponse($country);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(country $country)
    {
        return $this->sendResponse($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(country $country)
    {
        //
    }
}
