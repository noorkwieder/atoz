<?php

namespace App\Http\Controllers;

use App\Models\airport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Airportcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function __construct()
    {
        $this->middleware('permission:store_trip', ['only' => ['store']]);
        $this->middleware('permission:show_trip', ['only' => ['show','index']]);
        $this->middleware('permission:update_trip', ['only' => ['update']]);
        $this->middleware('permission:delet_trip', ['only' => ['destroy']]);
    }



    public function index()
    {
        $airport = airport::query()->get();

        return $this->sendResponse($airport);
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
            'name' => ['required']
         ]);
 
         $airport = airport::query()->create([
            'name' => $request->name
         ]);
 
         return $this->sendResponse($airport);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(airport $airport)
    {
        return $this->sendResponse($airport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, airport $airport)
    {
        $request->validate([
            'name' => ['required']
         ]);
 
         $airport = airport::query()->update([
            'name' => $request->name
         ]);
 
         return $this->sendResponse($airport);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(airport $airport)
    {
        $airport->delete();
        return $this->sendResponse(null);
    }
}
