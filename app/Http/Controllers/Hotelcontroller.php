<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;
class Hotelcontroller extends Controller
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
        $this->middleware('permission:update_hotel', ['only' => ['updatephone','updateimg']]);
        $this->middleware('permission:delet_hotel', ['only' => ['destroy']]);
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
        $hotelQuery = hotel::query();
        if ($key_search)
        $hotelQuery->where(function ($Q) use ($key_search) {
                $Q->where('name', 'like', '%'.$key_search.'%')
                    ;
            });

            $hotel = $hotelQuery->get();
            return $this->sendresponse($hotel);
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
            'phone'=>'required',
            'location'=> 'required',
            'stars'=>'required',
            'img_url'=>'required',
            'covernorate_id2'=> ['required', 'numeric', Rule::exists('covernorates', 'id')]
        ]);

        $file_name= $this -> saveImage($request-> img_url, 'img_url');

        $hotel = hotel::query()->create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'location'=> $request->location,
            'stars'=>$request->stars,
            'user_id' => Auth::id(),
            'img_url'=>$file_name,
            'covernorate_id2' => $request->covernorate_id2,
        ]);

        return $this->sendResponse($hotel);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(hotel $hotel)
    {
        $hotel->increment('views');

        return $this->sendResponse($hotel);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function updatephone(Request $request, hotel $hotel)
    {
       $request->validate([
            'phone'=>'required',
         
        ]);
        
      //  $user= User::find($user_id);
      $user= Auth::id();
        if($hotel->user_id == $user)
        {
            $hotel = hotel::query()->update([
                'phone'=>$request->phone,
                
            ]); 
        }
        return $this->sendResponse($hotel);

    }
    public function updateimg(Request $request, hotel $hotel)
    {
       $request->validate([
            'img_url'=>'required',
         
        ]);
        $file_name= $this -> saveImage($request-> img_url, 'img_url');

      //  $user= User::find($user_id);
      $user= Auth::id();
        if($hotel->user_id == $user)
        {
            $hotel = hotel::query()->update([
                'img_url'=>$file_name,
                
            ]); 
        }
        return $this->sendResponse($hotel);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(hotel $hotel)
    {
        $hotel->delete();
        return $this-> sendresponse(null);
        
    }
    
}
