<?php

namespace App\Http\Controllers;

use App\Models\toursimplace;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class Toursimplacecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:store_tour', ['only' => ['store']]);
        $this->middleware('permission:show_tour', ['only' => ['show','index']]);
        $this->middleware('permission:update_tour', ['only' => ['update']]);
        $this->middleware('permission:delet_tour', ['only' => ['destroy']]);
    }
    protected function saveImage($image, $folder)
    {
    //save image in folder 
    $file_extension = $image -> getClientOriginalextension();
    $file_name = time().'.'.$file_extension;
    $path =$folder;
    $image -> move($path,$file_name);
    return $file_name;
    }

    public function index()
    {
        
        $toursimplace = toursimplace::query()->get();

        return $this->sendResponse($toursimplace);
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
            'name'=>'required',
            'free_price'=>['required'],
            'open_time'=>'required',
            'close_time'=>'required',
            'location'=> 'required',
            'description'=>'required',
            
            'img_url'=>'required',
            'category_id'=> ['required', 'numeric', Rule::exists('categories', 'id')],
            'covernorate_id2'=> ['required', 'numeric', Rule::exists('covernorates', 'id')]
        ]);
        $file_name= $this -> saveImage($request-> img_url, 'img_url');

        $toursimplace = toursimplace::query()->create([
            'name' => $request->name,
            'free_price' => $request->free_price,
            'open_time'=>$request->open_time,
            'close_time'=>$request->close_time,
            'location'=> $request->location,
            'description' => $request->description,
            'img_url'=>$file_name,
            'category_id' => $request->category_id,
            'covernorate_id2' => $request->covernorate_id2,
            
        ]);

    
        

        return $this->sendResponse($toursimplace);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\toursimplace  $toursimplace
     * @return \Illuminate\Http\Response
     */
    public function show(toursimplace $toursimplace)
    {
        $toursimplace->increment('views');

        return $this->sendResponse($toursimplace);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\toursimplace  $toursimplace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, toursimplace $toursimplace)
    {
        $request->validate([
            'name'=>'required',
            'free_price'=>['required'],
            'open_time'=>'required',
            'close_time'=>'required',
            'location'=> 'required',
            'description'=>'required',
            
            'img_url'=>'required',
            'category_id'=> ['required', 'numeric', Rule::exists('categories', 'id')],
             'covernorate_id2'=> ['required', 'numeric', Rule::exists('covernorates', 'id')]
        ]);

        $toursimplace ->update([
            'name' => $request->name,
            'free_price' => $request->free_price,
            'open_time'=>$request->open_time,
            'close_time'=>$request->close_time,
            'location'=> $request->location,
            'description' => $request->description,
            'img_url' => $request->img_url,
            'category_id' => $request->category_id,
            'covernorate_id2' => $request->covernorate_id2,
        ]);

    
        

        return $this->sendResponse($toursimplace);
    
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\toursimplace  $toursimplace
     * @return \Illuminate\Http\Response
     */
    public function destroy(toursimplace $toursimplace)
    {
        $toursimplace->delete();
        return $this->sendResponse(null);
    }
}
