<?php

namespace App\Http\Controllers;

use App\Models\escort;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class Escortcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:store_escort', ['only' => ['store']]);
        $this->middleware('permission:show_escort', ['only' => ['show','index']]);
        $this->middleware('permission:update_escort', ['only' => ['updatephone','updateprice','updatefree']]);
        $this->middleware('permission:delet_escort', ['only' => ['destroy']]);
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
        $key_search = $request->input('key_search');
        $escortQuery = escort::query();
        if ($key_search)
        $escortQuery->where(function ($Q) use ($key_search) {
                $Q->where('name', 'like', '%'.$key_search.'%')
                    ;
            });

            $escort = $escortQuery->get();
            return $this->sendresponse($escort);
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
            'f_name'=>'required',
            'l_name'=>'required',
            'phone'=>'required',
            'free'=>'required',
            'price_per_day'=>'required',
        
            'img_url'=>'required',
            'covernorate_id2'=> ['required', 'numeric', Rule::exists('covernorates', 'id')]
        ]);
        $file_name= $this -> saveImage($request-> img_url, 'img_url');

        $escort = escort::query()->create([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'price_per_day'=>$request->price_per_day,
            'phone'=>$request->phone,
            'free'=>$request->free,
            'user_id' => Auth::id(),
            'img_url'=>$file_name,
            'covernorate_id2' => $request->covernorate_id2,
        ]);

        
       
        
        return $this->sendResponse($escort);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function show(escort $escort)
    {
        

        return $this->sendResponse($escort);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function updatephone(Request $request, escort $escort)
    {
        $request->validate([
           
            'phone'=>'required',
        
        ]);
        
        $user= Auth::id();
        if($escort->user_id == $user){
        $escort = escort::query()->update([
            
            'phone'=>$request->phone,
           
            
        ]);

    }
       
        
        return $this->sendResponse($escort);
    }
    public function updateprice(Request $request, escort $escort)
    {
        $request->validate([
           
            'price_per_day'=>'required',
        
        ]);
        
        $user= Auth::id();
        if($escort->user_id == $user){
        $escort = escort::query()->update([
            
            'price_per_day'=>$request->price_per_day,
           
            
        ]);

    }
       
        
        return $this->sendResponse($escort);
    }
    public function updatefree(Request $request, escort $escort)
    {
        $request->validate([
           
            'free'=>'required',
        
        ]);
        
        $user= Auth::id();
        if($escort->user_id == $user){
        $escort = escort::query()->update([
            
            'free'=>$request->free,
           
            
        ]);

    }
       
        
        return $this->sendResponse($escort);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function destroy(escort $escort)
    {
        $resturant->delete();
        return $this-> sendresponse(null);
    }
}
