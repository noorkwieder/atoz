<?php

namespace App\Http\Controllers;

use App\Models\covernorate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class Covernoratecontroller extends Controller
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
            
            'country_id'=> ['required', 'numeric', Rule::exists('countres', 'id')]
            
         ]);
 
         $covernorate = covernorate::query()->create([
            'name' => $request->name,
            
            'country_id' => $request->country_id,
         ]);
 
         return $this->sendResponse($covernorate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\covernorate  $covernorate
     * @return \Illuminate\Http\Response
     */
    public function show(covernorate $covernorate)
    {
        return $this->sendResponse($covernorate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\covernorate  $covernorate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, covernorate $covernorate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\covernorate  $covernorate
     * @return \Illuminate\Http\Response
     */
    public function destroy(covernorate $covernorate)
    {
        //
    }
}
