<?php

namespace App\Http\Controllers;

use App\Models\saveresturant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class Saveresturantcontroller extends Controller
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
        $saveresturant = saveresturant::query()->get();

        return $this->sendResponse($saveresturant);
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
        
            'resturant_id'=> ['required', 'numeric', Rule::exists('Resturants', 'id')],
            'user_id'=> ['required', 'numeric', Rule::exists('Users', 'id')]
            
         ]);
 
         $saveresturant = saveresturant::query()->create([
            
            'resturant_id' => $request->resturant_id,
            'user_id' => $request->user_id,
         ]);
 
         return $this->sendResponse($saveresturant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\saveresturant  $saveresturant
     * @return \Illuminate\Http\Response
     */
    public function show(saveresturant $saveresturant)
    {
        return $this->sendResponse($saveresturant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\saveresturant  $saveresturant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, saveresturant $saveresturant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\saveresturant  $saveresturant
     * @return \Illuminate\Http\Response
     */
    public function destroy(saveresturant $saveresturant)
    {
        $saveresturant->delete();
        return $this->sendResponse(null);
    }
}
