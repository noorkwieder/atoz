<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Companycontroller extends Controller
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
        $this->middleware('permission:update_trip', ['only' => ['update']]);
        $this->middleware('permission:delet_trip', ['only' => ['destroy']]);
    }
    public function index()
    {
        $company = company::query()->get();

        return $this->sendResponse($company);
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
            'name' => ['required']
         ]);
 
         $company = company::query()->create([
            'name' => $request->name
         ]);
 
         return $this->sendResponse($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        return $this->sendResponse($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        $request->validate([
            'name' => ['required']
         ]);
 
         $company = company::query()->update([
            'name' => $request->name
         ]);
 
         return $this->sendResponse($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        $company->delete();
        return $this->sendResponse(null);
    }
}
