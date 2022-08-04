<?php

namespace App\Http\Controllers;

use App\Models\Resturant;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class Resturantcontroller extends Controller
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
        $this->middleware('permission:update_resturant', ['only' => ['updatephone','updateimg','updatetime']]);
        $this->middleware('permission:delet_resturant', ['only' => ['destroy']]);
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

    public function index(Request $request)
    {
        $key_search = $request->input('key_search');
        $Resturantuery = Resturant::query();
        if ($key_search)
        $Resturantuery->where(function ($Q) use ($key_search) {
                $Q->where('name', 'like', '%'.$key_search.'%')
                    ;
            });

            $resturant = $Resturantuery->get();
            return $this->sendresponse($resturant);
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
            'open_time'=>'required',
            'close_time'=>'required',
            'phone'=>'required',
            'location'=> 'required',
            'stars'=>'required',
        
            'img_url'=>'required',
            'covernorate_id2'=> ['required', 'numeric', Rule::exists('covernorates', 'id')]
        ]);
        $file_name= $this -> saveImage($request-> img_url, 'img_url');

        $resturant = Resturant::query()->create([
            'name'=>$request->name,
            'open_time'=>$request->open_time,
            'close_time'=>$request->close_time,
            'phone'=>$request->phone,
            'location'=> $request->location,
            'stars'=>$request->stars,
            'user_id' => Auth::id(),
            'img_url'=>$file_name,
            'covernorate_id2' => $request->covernorate_id2,
        ]);

        
       
        
        return $this->sendResponse($resturant);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant)
    {
        $resturant->increment('views');

        return $this->sendResponse($resturant);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function updatetime(Request $request, Resturant $resturant)
    {
        $request->validate([
            'open_time'=>'required',
            'close_time'=>'required',
           
        ]);
        $user= Auth::id();
        if($restaurent->user_id == $user)
        {
        $resturant ->update([
            
            'open_time'=>$request->open_time,
            'close_time'=>$request->close_time,
            
           
        ]);
    }

        return $this->sendResponse($resturant);

    }
    public function updatephone(Request $request, Resturant $resturant)
    {
        $request->validate([
            'phone'=>'required',
           
        ]);
        $user= Auth::id();
        if($restaurent->user_id == $user)
        {
        $resturant ->update([
            
            'phone'=>$request->phone,
            
           
        ]);
    }

        return $this->sendResponse($resturant);

    }

    public function updateimg(Request $request, Resturant $resturant)
    {
        $request->validate([
            'img_url'=>'required',
           
        ]);
        $file_name= $this -> saveImage($request-> img_url, 'img_url');

        $user= Auth::id();
        if($restaurent->user_id == $user)
        {
        $resturant ->update([
            
            'img_url'=>$file_name,
            
           
        ]);
    }

        return $this->sendResponse($resturant);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resturant $resturant)
    {
        $resturant->delete();
        return $this-> sendresponse(null);
    }
}
