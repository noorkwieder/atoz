<?php

namespace App\Http\Controllers;

use App\Models\savetour;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
class Savetourcontroller extends Controller
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
    
        


        $savetour = savetour::query()->get();

        return $this->sendResponse($savetour);
    
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
        
            'toursimplaces2_id'=> ['required', 'numeric', Rule::exists('toursimplaces2', 'id')],
            'user_id'=> ['required', 'numeric', Rule::exists('Users', 'id')]
            
         ]);
 
         $savetour= savetour::query()->create([
            
            'toursimplaces2_id' => $request->toursimplaces2_id,
            'user_id' => $request->user_id,
         ]);
 
         return $this->sendResponse($savetour);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\savetour  $savetour
     * @return \Illuminate\Http\Response
     */
    public function show(savetour $savetour)
    {
        return $this->sendResponse($savetour);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\savetour  $savetour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, savetour $savetour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\savetour  $savetour
     * @return \Illuminate\Http\Response
     */
    public function destroy(savetour $savetour)
    {
        $savetour->delete();
        return $this->sendResponse(null);
    }
}
