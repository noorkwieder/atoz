<?php

namespace App\Http\Controllers;

use App\Models\trip;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class Tripcontroller extends Controller
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
        $this->middleware('permission:update_trip', ['only' => ['updatetime','updatedate']]);
        $this->middleware('permission:delet_trip', ['only' => ['destroy']]);
    }
    public function index()
    {
        $trip = trip::query()->get();

        return $this->sendResponse($trip);
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
            'from'=>'required',
            'to'=>'required',
            'time'=>'required',
            'date'=>'required',
            'period'=> 'required',
            
            'company_id'=> ['required', 'numeric', Rule::exists('companys', 'id')],
            'airport_id'=> ['required', 'numeric', Rule::exists('airports', 'id')]
        ]);

        $trip = trip::query()->create([
            'from'=>$request->from,
            'time'=>$request->time,
            'to'=>$request->to,
            'period'=>$request->period,
            'date'=> $request->date,
            'user_id' => Auth::id(),
            'airport_id'=>$request->airport_id,
            'company_id' => $request->company_id,
        ]);
        
        return $this->sendResponse($trip);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(trip $trip)
    {
        
        return $this->sendResponse($trip);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function updatetime(Request $request, trip $trip)
    {
        $request->validate([
            'time'=>'required',
           
        ]);

        $user= Auth::id();
        if($trip->user_id == $user){
        $trip = trip::query()->update([
            'time'=>$request->time,
           
        ]);
    }
        
       
        
        return $this->sendResponse($trip);



    }
    public function updatedate(Request $request, trip $trip)
    {
        $request->validate([
            'date'=>'required',
           
        ]);

        $user= Auth::id();
        if($trip->user_id == $user){
        $trip = trip::query()->update([
            'date'=>$request->date,
           
        ]);
    }
        
       
        
        return $this->sendResponse($trip);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(trip $trip)
    {
        $trip->delete();
        return $this->sendResponse(null);
    }
}
