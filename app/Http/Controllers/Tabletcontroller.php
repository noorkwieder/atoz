<?php

namespace App\Http\Controllers;

use App\Models\Tablet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class Tabletcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:store_resturant', ['only' => ['store']]);
        $this->middleware('permission:show_resturant', ['only' => ['show','index']]);
        $this->middleware('permission:update_resturant', ['only' => ['updatefree']]);
        $this->middleware('permission:delet_resturant', ['only' => ['destroy']]);
    }
    public function index()
    {
        $tablets = Tablet::query()->get();

        return $this->sendResponse($tablets);
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
            'free' => 'required',
            'number_of_person' => ['required'],
            'resturant_id'=> ['required', 'numeric', Rule::exists('Resturants', 'id')]
            
         ]);
 
         $tablet = Tablet::query()->create([
            'type' => $request->type,
            'free' => $request->free,
            'number_of_person' => $request->number_of_person,
            'resturant_id' => $request->resturant_id,
         ]);
 
         return $this->sendResponse($tablet);
    }
    public function show(Tablet $tablet)
    {
    

        return $this->sendResponse($tablet);


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tablet  $tablet
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tablet  $tablet
     * @return \Illuminate\Http\Response
     */
    public function updatefree(Request $request, Tablet $tablet)
    {
        $request->validate([
            
            'free' => 'required',
            
        ]);

        $tablet->update([
        
            'free' => $request->free,
            
        ]);

        return $this->sendResponse($tablet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tablet  $tablet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tablet $tablet)
    {
        $tablet->delete();
        return $this->sendResponse(null);
    }
}
