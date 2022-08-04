<?php

namespace App\Http\Controllers;

use App\Models\savehotel;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
class Savehotelcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('permission:store_user', ['only' => ['store']]);
        $this->middleware('permission:show_user', ['only' => ['show','index']]);
        $this->middleware('permission:update_user', ['only' => ['update']]);
        $this->middleware('permission:delet_user', ['only' => ['destroy']]);
    }
    public function index()
    {
        $savehotel = savehotel::query()->get();

        return $this->sendResponse($savehotel);
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
          
            'hotel_id'=> ['required', 'numeric', Rule::exists('Hotels', 'id')],
            'user_id'=> ['required', 'numeric', Rule::exists('Users', 'id')]
            
         ]);
 
         $savehotel = savehotel::query()->create([
           
            'hotel_id' => $request->hotel_id,
            'user_id' => $request->user_id,
         ]);
 
         return $this->sendResponse($savehotel);





        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\savehotel  $savehotel
     * @return \Illuminate\Http\Response
     */
    public function show(savehotel $savehotel)
    {
        return $this->sendResponse($savehotel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\savehotel  $savehotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, savehotel $savehotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\savehotel  $savehotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(savehotel $savehotel)
    {
        $savehotel->delete();
        return $this->sendResponse(null);
    }
}
