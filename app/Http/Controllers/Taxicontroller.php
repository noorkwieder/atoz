<?php

namespace App\Http\Controllers;

use App\Models\taxi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class Taxicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:store_taxi', ['only' => ['store']]);
        $this->middleware('permission:show_taxi', ['only' => ['show','index']]);
        $this->middleware('permission:update_taxi', ['only' => ['updateprice']]);
        $this->middleware('permission:delet_taxi', ['only' => ['destroy']]);
    }
    public function index()
    {
        $taxi = taxi::query()->get();

        return $this->sendResponse($taxi);
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
            'phone_url' => 'required',
            'price_per_1km' => ['required'],
           'covernorate_id'=> ['required', 'numeric', Rule::exists('covernorates', 'id')]
            
         ]);
 
         $taxi =taxi::query()->create([
            'name' => $request->name,
            'phone_url' => $request->phone_url,
            'price_per_1km' => $request->price_per_1km,
            'covernorate_id' => $request->covernorate_id,
         ]);
         return $this->sendResponse($taxi);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function show(taxi $taxi)
    {
        return $this->sendResponse($taxi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function updateprice(Request $request, taxi $taxi)
    {
        $request->validate([
            
            'price_per_1km' => ['required'],
           
         ]);
 
         $taxi->update([
            
            'price_per_1km' => $request->price_per_1km,
            
         ]);
         return $this->sendResponse($taxi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function destroy(taxi $taxi)
    {
        $taxi->delete();
        return $this->sendResponse(null);
    }
}
