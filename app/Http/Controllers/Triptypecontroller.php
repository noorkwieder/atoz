<?php

namespace App\Http\Controllers;

use App\Models\triptype;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Triptypecontroller extends Controller
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
        $this->middleware('permission:update_trip', ['only' => ['updatefree']]);
        $this->middleware('permission:delet_trip', ['only' => ['destroy']]);
    }
    public function index()
    {
        $triptype = triptype::query()->get();

        return $this->sendResponse($triptype);
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
            'type'=>'required',
            'price'=>'required',
            
            'free'=> 'required',
            'trip_id'=> ['required', 'numeric', Rule::exists('Trips', 'id')],
     
        ]);

        $triptype = triptype::query()->create([
            'type'=>$request->type,
            'price'=>$request->price,
            'free'=>$request->free,
           
        
            'trip_id'=>$request->trip_id,
           
        ]);
        
        return $this->sendResponse($triptype);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\triptype  $triptype
     * @return \Illuminate\Http\Response
     */
    public function show(triptype $triptype)
    {
        return $this->sendResponse($triptype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\triptype  $triptype
     * @return \Illuminate\Http\Response
     */
    public function updatefree(Request $request, triptype $triptype)
    {
        $request->validate([
           
            
            'free'=> 'required',
     
        ]);

        $triptype = triptype::query()->update([
            'free'=>$request->free,           
        ]);
        
        return $this->sendResponse($triptype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\triptype  $triptype
     * @return \Illuminate\Http\Response
     */
    public function destroy(triptype $triptype)
    {
        $triptype->delete();
        return $this->sendResponse(null);
    }
}
