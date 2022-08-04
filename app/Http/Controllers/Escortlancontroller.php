<?php

namespace App\Http\Controllers;

use App\Models\escortlan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class Escortlancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:store_escort', ['only' => ['store']]);
        $this->middleware('permission:show_escort', ['only' => ['show','index']]);
        $this->middleware('permission:update_escort', ['only' => ['update']]);
        $this->middleware('permission:delet_escort', ['only' => ['destroy']]);
    }








    public function index()
    {
        $escortlan = escortlan::query()->get();

        return $this->sendResponse($escortlan);
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
            'name' => ['required'],
            
            'escort_id'=> ['required', 'numeric', Rule::exists('Escorts', 'id')]

         ]);
 
         $escortlan = escortlan::query()->create([
            'name' => $request->name
            ,
            'escort_id'=> $request->escort_id
         ]);
 
         return $this->sendResponse($escortlan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\escortlan  $escortlan
     * @return \Illuminate\Http\Response
     */
    public function show(escortlan $escortlan)
    {
        return $this->sendResponse($escortlan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\escortlan  $escortlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, escortlan $escortlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\escortlan  $escortlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(escortlan $escortlan)
    {
        $escortlan->delete();
        return $this->sendResponse(null);
    }
}
