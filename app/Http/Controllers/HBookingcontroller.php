<?php

namespace App\Http\Controllers;

use App\Models\hbooking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
class HBookingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:book_hotel', ['only' => ['store']]);
        $this->middleware('permission:book_hotel', ['only' => ['show','index']]);
        $this->middleware('permission:book_hotel', ['only' => ['updatedone']]);
        $this->middleware('permission:book_hotel', ['only' => ['destroy']]);
    }










    public function index()
    {
        $hbooking = hbooking::query()->get();

        return $this->sendResponse($hbooking);
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
            'enter_date' => 'required',
            'days' => 'required',
            'done' => 'required',
            'roomtype_id'=> ['required', 'numeric', Rule::exists('roomtybe', 'id')],
            'user_id'=> ['required', 'numeric', Rule::exists('Users', 'id')]
            
         ]);
 
         $hbooking = hbooking::query()->create([
            'enter_date' => $request->enter_date,
            'days' => $request->days,
            'done' => $request->done,
            'roomtype_id' => $request->roomtype_id,
            'user_id' => $request->user_id,
         ]);
 
         return $this->sendResponse($hbooking);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hbooking  $hbooking
     * @return \Illuminate\Http\Response
     */
    public function show(hbooking $hbooking)
    {
        return $this->sendResponse($hbooking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hbooking  $hbooking
     * @return \Illuminate\Http\Response
     */
    public function updatedone(Request $request, hbooking $hbooking)
    {
        $request->validate([
            
            'done' => 'required',
            
         ]);
 
         $hbooking = hbooking::query()->update([
          
            
            'done' => $request->done,
           
         ]);
 if($hbooking -> done == 'yes')
 {
    $user = User::find($user_id);
    $user-> point += 200;
 }
         return $this->sendResponse($hbooking);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hbooking  $hbooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(hbooking $hbooking)
    {
        $hbooking->delete();
        return $this->sendResponse(null);
    }
}
