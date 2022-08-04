<?php

namespace App\Http\Controllers;

use App\Models\roomtype;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class Roomtypecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:store_hotel', ['only' => ['store']]);
        $this->middleware('permission:show_hotel', ['only' => ['show','index']]);
        $this->middleware('permission:update_hotel', ['only' => ['updatefree','updateprice']]);
        $this->middleware('permission:delet_hotel', ['only' => ['destroy']]);
    }
    public function index()
    {
        $roomtype= Tablet::query()->get();

        return $this->sendResponse($roomtype);
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
            'type' => 'required',
            'price' => 'required',
            'free' => 'required',
            'number_of_person' => ['required'],
            'hotel_id'=> ['required', 'numeric', Rule::exists('Hotels', 'id')]
            
         ]);
 
         $roomtype = roomtype::query()->create([
            'type' => $request->type,
            'free' => $request->free,
            'price' => $request->price,
            'number_of_person' => $request->number_of_person,
            'hotel_id' => $request->hotel_id,
         ]);
 
         return $this->sendResponse($roomtype);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function show(roomtype $roomtype)
    {
        
        return $this->sendResponse($roomtype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function updateprice(Request $request, roomtype $roomtype)
    {
        $request->validate([
           
            'price' => 'required',
            
            
         ]);
 
         $roomtype = roomtype::query()->update([
            
            'price' => $request->price,
           
         ]);
 
         return $this->sendResponse($roomtype);
    }

    public function updatefree(Request $request, roomtype $roomtype)
    {
        $request->validate([
           
            'free' => 'required',
            
            
         ]);
 
         $roomtype = roomtype::query()->update([
            
            'free' => $request->free,
           
         ]);
 
         return $this->sendResponse($roomtype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(roomtype $roomtype)
    {
        $roomtype->delete();
        return $this->sendResponse(null);
    }
}
