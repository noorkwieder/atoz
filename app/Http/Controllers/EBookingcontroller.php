<?php

namespace App\Http\Controllers;

use App\Models\ebooking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class EBookingcontroller extends Controller
{  public function __construct()
    {
        $this->middleware('permission:book_escort', ['only' => ['store']]);
        $this->middleware('permission:book_escort', ['only' => ['show','index']]);
        $this->middleware('permission:book_escort', ['only' => ['updatedone']]);
        $this->middleware('permission:book_escort', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebooking = ebooking::query()->get();

        return $this->sendResponse($ebooking);
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
            'number_day' => 'required',
            'done' => 'required',
            'escort_id'=> ['required', 'numeric', Rule::exists('Resturants', 'id')],
            'user_id'=> ['required', 'numeric', Rule::exists('Users', 'id')]
            
         ]);
 
         $ebooking = ebooking::query()->create([
            'date' => $request->date,
            'number_day' => $request->number_day,
            'done' => $request->done,
            'escort_id' => $request->escort_id,
            'user_id' => $request->user_id,
         ]);
 
         return $this->sendResponse($ebooking);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ebooking  $ebooking
     * @return \Illuminate\Http\Response
     */
    public function show(ebooking $ebooking)
    {
        return $this->sendResponse($ebooking);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ebooking  $ebooking
     * @return \Illuminate\Http\Response
     */
    public function updatedone(Request $request, ebooking $ebooking)
    {
        $request->validate([
           
            'done' => 'required',
           
         ]);
 
         $ebooking = ebooking::query()->update([
            
            'done' => $request->done,
           
         ]);
 
         return $this->sendResponse($ebooking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ebooking  $ebooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(ebooking $ebooking)
    {
        $ebooking->delete();
        return $this->sendResponse(null);
    }
}
