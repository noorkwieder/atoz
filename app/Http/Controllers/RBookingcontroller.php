<?php

namespace App\Http\Controllers;

use App\Models\rbooking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class RBookingcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:book_resturant', ['only' => ['store']]);
        $this->middleware('permission:book_resturant', ['only' => ['show','index']]);
        $this->middleware('permission:book_resturant', ['only' => ['updatedone']]);
        $this->middleware('permission:book_resturant', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rbooking = rbooking::query()->get();

        return $this->sendResponse($rbooking);
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
            'date' => 'required',
            'time' => 'required',
            'done' => 'required',
            'table_id'=> ['required', 'numeric', Rule::exists('Tablets', 'id')],
            'user_id'=> ['required', 'numeric', Rule::exists('Users', 'id')]
            
         ]);
 
         $rbooking = rbooking::query()->create([
            'date' => $request->date,
            'time' => $request->time,
            'done' => $request->done,
            'table_id' => $request->table_id,
            'user_id' => $request->user_id,
         ]);
 
         return $this->sendResponse($rbooking);
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rbooking  $rbooking
     * @return \Illuminate\Http\Response
     */
    public function show(rbooking $rbooking)
    {
        return $this->sendResponse($rbooking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rbooking  $rbooking
     * @return \Illuminate\Http\Response
     */
    public function updatedone(Request $request, rbooking $rbooking)
    {
        $request->validate([
           
            'done' => 'required',
           
            
         ]);
 
         $rbooking = rbooking::query()->update([
           
            'done' => $request->done,
            
         ]);
 
         return $this->sendResponse($rbooking);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rbooking  $rbooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(rbooking $rbooking)
    {
        $rbooking->delete();
        return $this->sendResponse(null);
    }
}
