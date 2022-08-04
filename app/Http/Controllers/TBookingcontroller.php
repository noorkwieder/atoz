<?php

namespace App\Http\Controllers;

use App\Models\tbooking;
use Illuminate\Http\Request;

class TBookingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:book_trip', ['only' => ['store']]);
        $this->middleware('permission:book_trip', ['only' => ['show','index']]);
        $this->middleware('permission:book_trip', ['only' => ['updatedone']]);
        $this->middleware('permission:book_trip', ['only' => ['destroy']]);
    }
    public function index()
    {
        $tbooking = tbooking::query()->get();

        return $this->sendResponse($tbooking);
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
          
            'done' => 'required',
            'triptype_id'=> ['required', 'numeric', Rule::exists('TripsType', 'id')],
            'user_id'=> ['required', 'numeric', Rule::exists('Users', 'id')]
            
         ]);
 
         $tbooking = tbooking::query()->create([
         
          
            'done' => $request->done,
            'triptype_id' => $request->triptype_id,
            'user_id' => $request->user_id,
         ]);
 
         return $this->sendResponse($tbooking);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbooking  $tbooking
     * @return \Illuminate\Http\Response
     */
    public function show(tbooking $tbooking)
    {
        
        return $this->sendResponse($tbooking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbooking  $tbooking
     * @return \Illuminate\Http\Response
     */
    public function updatedone(Request $request, tbooking $tbooking)
    {
        $request->validate([
          
            'done' => 'required',
           
         ]);
 
         $tbooking = tbooking::query()->update([
         
          
            'done' => $request->done,
           
         ]);
 
         return $this->sendResponse($tbooking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbooking  $tbooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbooking $tbooking)
    {
        $tbooking->delete();
        return $this->sendResponse(null);
    }
}
